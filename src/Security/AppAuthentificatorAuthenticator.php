<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;






class AppAuthentificatorAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;
    use TargetPathTrait;

    private $urlGenerator;
    private $flashBag;
    private $session;
    public const LOGIN_ROUTE = 'app_login';

    

    public function __construct(UrlGeneratorInterface $urlGenerator, FlashBagInterface $flashBag, SessionInterface $session, TokenStorageInterface $tokenStorage)
    {
        $this->urlGenerator = $urlGenerator;
        $this->flashBag = $flashBag;
        $this->session = $session;
        $this->tokenStorage = $tokenStorage;
    }

    public function authenticate(Request $request): Passport
    {
        $mail = $request->request->get('mail', '');

        $request->getSession()->set(Security::LAST_USERNAME, $mail);

        return new Passport(
            new UserBadge($mail),
            new PasswordCredentials($request->request->get('password', '')),
            [
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }
    
        // Vérifier si l'utilisateur connecté est bloqué
        $user = $token->getUser();
        if ($user->getIsBlocked()) {
            // Add a flash message using the session
            $this->session->getFlashBag()->add('error', 'Vous êtes bloqué!');
            $this->tokenStorage->setToken(null);
            $request->getSession()->invalidate();
    
            return new RedirectResponse($this->urlGenerator->generate('app_login'));
        }
    
        // redirection selon role
        $role = $token->getUser()->getRoles();
    
        if(in_array('ROLE_ADMIN', $role)){

            return new RedirectResponse($this->urlGenerator->generate('app_admin'));
    
        }else{
            return new RedirectResponse($this->urlGenerator->generate('app_front_side'));
    
        }
    
        // For example:
        // return new RedirectResponse($this->urlGenerator->generate('app_user_freelancers'));
        throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
    }
    

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }

}