<?php

namespace App\Controllers;

use App\Models\User;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;


class MainController extends CoreController
{
    public function main()
    {
        $this->render(
            'main/main',
            [
                //vars
            ]
        );
    }

    public function register()
    {
        //var_dump($_POST);
        if (!empty($_POST)) {
            $validator = Validation::createValidator();
            $input = [

                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],

                'email' => $_POST['email'],
                'emailConfirmation' => $_POST['email-confirmation'],
                'password' => $_POST['password'],
                'dob' => $_POST['dob'],
                'gender' => $_POST['gender'],
            ];


            $constraint = new Assert\Collection([
                // the keys correspond to the keys in the input array
                'firstname' => new Assert\Length(['min' => 3]),
                'lastname' => new Assert\Length(['min' => 3]),
                'email' => [
                    new Assert\Email(),
                    /*  new Assert\Regex([
                        'pattern' => '/^
                                    (?:(?:\+|00)33|0)    
                                    \s*[1-9]         
                                    (?:[\s.-]*\d{2}){4}
                                    ',
                    ]), */
                ],
                'emailConfirmation' => [
                    new Assert\Email(),
                    new Assert\IdenticalTo($_POST['email'])
                ],
                'password' => new Assert\Length(['min' => 6]),
                'dob' => new Assert\LessThan('today'),
                'gender' => new Assert\NotBlank(),
            ]);


            $violations = $validator->validate($input, $constraint);
            //form is not valid
            if (0 !== count($violations)) {
                // there are errors, now you can show them
                foreach ($violations as $violation) {
                    $errors[] =  $violation->getMessage();
                }

                $this->render(
                    'main/register',
                    [
                        'message' => $errors
                    ]
                );
            } else {  //form is valid 

                //hydrat User
                $user = new User();
                $user->setFirstname($_POST['firstname']);
                $user->setLastname($_POST['lastname']);
                $user->setEmail($_POST['email']);
                $user->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));
                $user->setdob($_POST['dob']);
                $user->setGender($_POST['gender']);

                //redirect
                if ($user->insert()) {
                    header("Location: {$_SERVER['BASE_URI']}");
                    die();
                }
            }
        }
    }

    public function login()
    {

        if (!empty($_POST)) {
            $validator = Validation::createValidator();
            $input = [

                'email' => $_POST['login-email'],
                'password' => $_POST['login-password'],
            ];


            $constraint = new Assert\Collection([
                // the keys correspond to the keys in the input array
                'email' => [
                    new Assert\Email(),
                    /*  new Assert\Regex([
                        'pattern' => '/^
                                    (?:(?:\+|00)33|0)    
                                    \s*[1-9]         
                                    (?:[\s.-]*\d{2}){4}
                                    ',
                    ]), */
                ],
                'password' => new Assert\Length(['min' => 6])
            ]);


            $violations = $validator->validate($input, $constraint);
            //form is not valid
            if (0 !== count($violations)) {
                // there are errors, now you can show them
                foreach ($violations as $violation) {
                    $errors[] =  $violation->getMessage();
                }

                $_SESSION['error-login'] = 'Identifients invalides !';
                return $this->redirectToRoute("main");
            } else {  //form is valid 

                $user = User::find($_POST['login-email']);
                //redirect
                if ($user && password_verify($_POST['login-password'], $user->getPassword())) {
                    return $this->redirectToRoute("home");
                }
                $_SESSION['error-login'] = 'Identifients invalides !';
                return $this->redirectToRoute("main");
            }
        }
    }

    public function home()
    {
        $this->render(
            'main/home',
            []
        );
    }
}
