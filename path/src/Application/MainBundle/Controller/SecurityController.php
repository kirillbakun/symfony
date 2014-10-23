<?php
    namespace Application\MainBundle\Controller;

    use Application\MainBundle\Entity\User;
    use Application\MainBundle\Form\Type\UserType;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Security\Core\SecurityContextInterface;

    class SecurityController extends Controller
    {
        public function loginAction(Request $request) {
            $session = $request->getSession();

            if ($request->attributes->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
                $error = $request->attributes->get(
                    SecurityContextInterface::AUTHENTICATION_ERROR
                );
            } elseif (!is_null($session) && $session->has(SecurityContextInterface::AUTHENTICATION_ERROR)) {
                $error = $session->get(SecurityContextInterface::AUTHENTICATION_ERROR);
                $session->remove(SecurityContextInterface::AUTHENTICATION_ERROR);
            } else {
                $error = '';
            }

            $last_username = (is_null($session)) ? $session->get($session->get(SecurityContextInterface::LAST_USERNAME)) : '';

            return $this->render(
                'ApplicationMainBundle:Security:login.html.php',
                array(
                    'last_username' => $last_username,
                    'error' => $error,
                )
            );
        }

        public function registerAction() {
            $user = new User();
            $form = $this->createForm(new UserType(), $user, array(
                'action' => $this->generateUrl('account_create'),
            ));

            return $this->render(
                'ApplicationMainBundle:Security:register.html.php',
                array(
                    'form' => $form->createView(),
                )
            );
        }

        public function createAction(Request $request) {
            $em = $this->getDoctrine()->getManager();
            $form = $this->createForm(new UserType(), new User());
            $form->handleRequest($request);

            if($form->isValid()) {
                $user = $form->getData();
                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($user);
                $password = $encoder->encodePassword($user->getPassword(), $user->getSalt());
                $user->setPassword($password);
                $em->persist($user);
                $em->flush();

                return $this->redirect($this->generateUrl('application_index'));
            }

            return $this->render(
                'ApplicationMainBundle:Security:register.html.php',
                array(
                    'form' => $form->createView(),
                )
            );
        }
    }