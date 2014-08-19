<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        // acceuil
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'acceuil');
            }

            return array (  '_controller' => 'Najdah\\AppBundle\\Controller\\AppController::acceuilAction',  '_route' => 'acceuil',);
        }

        // stat_index
        if (preg_match('#^/(?P<_locale>en|fr|ar)/Statistiques$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'stat_index')), array (  '_controller' => 'Najdah\\StatBundle\\Controller\\StatController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/Inter')) {
            // inter_creerUser
            if ($pathinfo === '/Inter/creerUser') {
                return array (  '_controller' => 'Najdah\\InterBundle\\Controller\\InterController::creerUserAction',  '_route' => 'inter_creerUser',);
            }

            // inter_setDeclaration
            if ($pathinfo === '/Inter/setDeclaration') {
                return array (  '_controller' => 'Najdah\\InterBundle\\Controller\\InterController::setDeclarationAction',  '_route' => 'inter_setDeclaration',);
            }

            // inter_createRapport
            if ($pathinfo === '/Inter/createRapport') {
                return array (  '_controller' => 'Najdah\\InterBundle\\Controller\\InterController::createRapportAction',  '_route' => 'inter_createRapport',);
            }

            // inter_getEtablissement
            if ($pathinfo === '/Inter/getEtablissement') {
                return array (  '_controller' => 'Najdah\\InterBundle\\Controller\\InterController::getEtablissementAction',  '_route' => 'inter_getEtablissement',);
            }

            // inter_connexion
            if ($pathinfo === '/Inter/connexion') {
                return array (  '_controller' => 'Najdah\\InterBundle\\Controller\\InterController::connexionAction',  '_route' => 'inter_connexion',);
            }

        }

        // etab_index
        if (preg_match('#^/(?P<_locale>en|fr|ar)/Etablissement$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'etab_index')), array (  '_controller' => 'Najdah\\EtabBundle\\Controller\\EtablissementController::indexAction',));
        }

        // etab_ajouter
        if (preg_match('#^/(?P<_locale>en|fr|ar)/Etablissement/ajouter$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'etab_ajouter')), array (  '_controller' => 'Najdah\\EtabBundle\\Controller\\EtablissementController::ajouterAction',));
        }

        // etab_afficher
        if (preg_match('#^/(?P<_locale>en|fr|ar)/Etablissement/afficher/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'etab_afficher')), array (  '_controller' => 'Najdah\\EtabBundle\\Controller\\EtablissementController::afficherAction',));
        }

        // etab_modifier
        if (preg_match('#^/(?P<_locale>en|fr|ar)/Etablissement/modifier/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'etab_modifier')), array (  '_controller' => 'Najdah\\EtabBundle\\Controller\\EtablissementController::modifierAction',));
        }

        // etab_supprimer
        if (preg_match('#^/(?P<_locale>en|fr|ar)/Etablissement/supprimer/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'etab_supprimer')), array (  '_controller' => 'Najdah\\EtabBundle\\Controller\\EtablissementController::supprimerAction',));
        }

        // najdah_admin_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'najdah_admin_homepage')), array (  '_controller' => 'Najdah\\AdminBundle\\Controller\\DefaultController::indexAction',));
        }

        // push_index
        if ($pathinfo === '/Push') {
            return array (  '_controller' => 'Najdah\\PushBundle\\Controller\\PushController::indexAction',  '_route' => 'push_index',);
        }

        // citoyen_index
        if (preg_match('#^/(?P<_locale>en|fr|ar)/Citoyen$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'citoyen_index')), array (  '_controller' => 'Najdah\\UserBundle\\Controller\\CitoyenController::indexAction',));
        }

        // citoyen_ajouter
        if (preg_match('#^/(?P<_locale>en|fr|ar)/Citoyen/ajouter$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'citoyen_ajouter')), array (  '_controller' => 'Najdah\\UserBundle\\Controller\\CitoyenController::ajouterAction',));
        }

        // citoyen_afficher
        if (preg_match('#^/(?P<_locale>en|fr|ar)/Citoyen/afficher/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'citoyen_afficher')), array (  '_controller' => 'Najdah\\UserBundle\\Controller\\CitoyenController::afficherAction',));
        }

        // citoyen_modifier
        if (preg_match('#^/(?P<_locale>en|fr|ar)/Citoyen/modifier/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'citoyen_modifier')), array (  '_controller' => 'Najdah\\UserBundle\\Controller\\CitoyenController::modifierAction',));
        }

        // citoyen_supprimer
        if (preg_match('#^/(?P<_locale>en|fr|ar)/Citoyen/supprimer/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'citoyen_supprimer')), array (  '_controller' => 'Najdah\\UserBundle\\Controller\\CitoyenController::supprimerAction',));
        }

        // user_index
        if (preg_match('#^/(?P<_locale>en|fr|ar)/(?P<type_user>Policier|Pompier)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_index')), array (  '_controller' => 'Najdah\\UserBundle\\Controller\\UserController::indexAction',));
        }

        // user_ajouter
        if (preg_match('#^/(?P<_locale>en|fr|ar)/(?P<type_user>Policier|Pompier)/ajouter$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_ajouter')), array (  '_controller' => 'Najdah\\UserBundle\\Controller\\UserController::ajouterAction',));
        }

        // user_afficher
        if (preg_match('#^/(?P<_locale>en|fr|ar)/(?P<type_user>Policier|Pompier)/afficher/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_afficher')), array (  '_controller' => 'Najdah\\UserBundle\\Controller\\UserController::afficherAction',));
        }

        // user_modifier
        if (preg_match('#^/(?P<_locale>en|fr|ar)/(?P<type_user>Policier|Pompier)/modifier/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_modifier')), array (  '_controller' => 'Najdah\\UserBundle\\Controller\\UserController::modifierAction',));
        }

        // user_supprimer
        if (preg_match('#^/(?P<_locale>en|fr|ar)/(?P<type_user>Policier|Pompier)/supprimer/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_supprimer')), array (  '_controller' => 'Najdah\\UserBundle\\Controller\\UserController::supprimerAction',));
        }

        // user_roles
        if (preg_match('#^/(?P<_locale>en|fr|ar)/(?P<type_user>Policier|Pompier)/roles/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_roles')), array (  '_controller' => 'Najdah\\UserBundle\\Controller\\UserController::rolesAction',));
        }

        // app_acceuil
        if (preg_match('#^/(?P<_locale>en|fr|ar)/?$#s', $pathinfo, $matches)) {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'app_acceuil');
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_acceuil')), array (  '_controller' => 'Najdah\\AppBundle\\Controller\\AppController::acceuilAction',  '_locale' => 'fr',));
        }

        // declaration_index
        if (preg_match('#^/(?P<_locale>en|fr|ar)/Declaration$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'declaration_index')), array (  '_controller' => 'Najdah\\AppBundle\\Controller\\DeclarationController::indexAction',));
        }

        // declaration_ajouter
        if (preg_match('#^/(?P<_locale>en|fr|ar)/Declaration/ajouter$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'declaration_ajouter')), array (  '_controller' => 'Najdah\\AppBundle\\Controller\\DeclarationController::ajouterAction',));
        }

        // declaration_afficher
        if (preg_match('#^/(?P<_locale>en|fr|ar)/Declaration/afficher/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'declaration_afficher')), array (  '_controller' => 'Najdah\\AppBundle\\Controller\\DeclarationController::afficherAction',));
        }

        // declaration_modifier
        if (preg_match('#^/(?P<_locale>en|fr|ar)/Declaration/modifier/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'declaration_modifier')), array (  '_controller' => 'Najdah\\AppBundle\\Controller\\DeclarationController::modifierAction',));
        }

        // declaration_supprimer
        if (preg_match('#^/(?P<_locale>en|fr|ar)/Declaration/supprimer/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'declaration_supprimer')), array (  '_controller' => 'Najdah\\AppBundle\\Controller\\DeclarationController::supprimerAction',));
        }

        // app_allnotice
        if (preg_match('#^/(?P<_locale>en|fr|ar)/allnotice$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_allnotice')), array (  '_controller' => 'Najdah\\AppBundle\\Controller\\NoticeController::getAllNoticeAction',));
        }

        // app_nbrNotice
        if (preg_match('#^/(?P<_locale>en|fr|ar)/nbrnotice$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_nbrNotice')), array (  '_controller' => 'Najdah\\AppBundle\\Controller\\NoticeController::getNbrNoticeAction',));
        }

        // app_notice
        if (preg_match('#^/(?P<_locale>en|fr|ar)/notices$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_notice')), array (  '_controller' => 'Najdah\\AppBundle\\Controller\\NoticeController::getAllNoticeAction',));
        }

        // details_declaration
        if (preg_match('#^/(?P<_locale>en|fr|ar)/detailsnotice/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'details_declaration')), array (  '_controller' => 'Najdah\\AppBundle\\Controller\\NoticeController::detailsNoticeAction',));
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
