<?php
    namespace Application\MainBundle\Controller;

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
    }