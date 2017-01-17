<?php

class HMW_Controllers_Rewrite extends HMW_Classes_FrontController
{

    public function __construct()
    {
        parent::__construct();
        add_filter('query_vars', array($this->model, 'addParams'));

        $this->model->buildRedirect();
        add_action('generate_rewrite_rules', array($this->model, 'setRewriteRules'));

        if (get_option('permalink_structure')) {

            //change the admin url $params['hmw_mode'] == 'default'
            add_filter('admin_url', array($this->model, 'admin_url'), 1, 1);
            add_filter('network_admin_url', array($this->model, 'network_admin_url'), 1, 1);
            add_filter('site_url', array($this->model, 'site_url'), 1, 1);
            add_filter('login_redirect', array($this->model, 'sanitize_redirect'), 1, 1);
            add_action('wp_logout', array($this->model, 'wp_logout'), 1, 1);
            //add_filter( 'logout_url', array($this->model, 'logout_url'), 1, 1);
            if (HMW_Classes_Tools::getIsset('hmw_disable')) {
                if (HMW_Classes_Tools::getValue('hmw_disable') == HMW_Classes_Tools::getOption('hmw_disable')) {
                    return;
                }
            }
            if(HMW_Classes_Tools::getOption('error') || HMW_Classes_Tools::getOption('logout')){
                return;
            }

            $this->hideUrl();
        }
    }

    /**
     * Check Hidden pages
     */
    function hideUrl()
    {

        if (!HMW_Classes_Tools::getOption('error') && !is_user_logged_in()) {

            if (HMW_Classes_Tools::getIsset('hmw_disable')) {
                if (HMW_Classes_Tools::getValue('hmw_disable') == HMW_Classes_Tools::getOption('hmw_disable')) {
                    return;
                }
            }

            if (isset($_SERVER['SERVER_NAME'])) {
                $url = $_SERVER['REQUEST_URI'];
                //redirect if no final slash is added
                if ($url == wp_make_link_relative(get_bloginfo('url')) . '/' . HMW_Classes_Tools::getOption('hmw_admin_url')) {
                    wp_redirect(admin_url());
                    exit();
                }

                $url = HMW_Classes_Tools::getRelativePath($url);

               // if (HMW_Classes_Tools::$default['hmw_admin_url'] <> HMW_Classes_Tools::getOption('hmw_admin_url')) {
                    if (strpos($url, '/wp-admin') !== false && HMW_Classes_Tools::getOption('hmw_hide_admin')) {
                        HMW_Classes_ObjController::getClass('HMW_Models_Rewrite')->getNotFound();
                    }

                    if ($url == '/admin' && HMW_Classes_Tools::getOption('hmw_admin_url') <> 'admin' && HMW_Classes_Tools::getOption('hmw_hide_admin')) {
                        HMW_Classes_ObjController::getClass('HMW_Models_Rewrite')->getNotFound();
                    }
               // }

                if (HMW_Classes_Tools::$default['hmw_login_url'] <> HMW_Classes_Tools::getOption('hmw_login_url')) {
                    if (strpos($url, '/wp-login') !== false && HMW_Classes_Tools::getOption('hmw_hide_login')) {
                        HMW_Classes_ObjController::getClass('HMW_Models_Rewrite')->getNotFound();
                    }
                    if ($url == '/login' && HMW_Classes_Tools::getOption('hmw_login_url') <> 'login' && HMW_Classes_Tools::getOption('hmw_hide_login')) {
                        HMW_Classes_ObjController::getClass('HMW_Models_Rewrite')->getNotFound();
                    }
                }
            }
        }
    }


}
