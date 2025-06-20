<?php
    $setting = \App\Models\Utility::getCookieSetting();
?>

<link rel='stylesheet' href='<?php echo e(asset('assets/css/cookieconsent.css')); ?>' media="screen" />
<script src="<?php echo e(asset('assets/js/cookieconsent.js')); ?>"></script>
<script>
    let language_code = document.documentElement.getAttribute('lang');
    let languages = {};
    languages[language_code] = {
        consent_modal: {
            title: 'hello',
            description: 'description',
            primary_btn: {
                text: 'primary_btn text',
                role: 'accept_all'
            },
            secondary_btn: {
                        text: 'secondary_btn text',
                        role: 'accept_necessary'
                    }
                },
                settings_modal: {
                    title: 'settings_modal',
                    save_settings_btn: 'save_settings_btn',
                    accept_all_btn: 'accept_all_btn',
                    reject_all_btn: 'reject_all_btn',
                    close_btn_label: 'close_btn_label',
                    blocks: [{
                            title: 'block title',
                            description: 'block description'
                        },

                        {
                            title: 'title',
                            description: 'description',
                            toggle: {
                                value: 'necessary',
                                enabled: true,
                                readonly: false
                            }
                        },
                    ]
                }
            };
            </script>
        <script>
            function setCookie(cname, cvalue, exdays) {
                const d = new Date();
                d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                let expires = "expires=" + d.toUTCString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
            }
            
            function getCookie(cname) {
                let name = cname + "=";
                let decodedCookie = decodeURIComponent(document.cookie);
                let ca = decodedCookie.split(';');
                for (let i = 0; i < ca.length; i++) {
                    let c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                        return c.substring(name.length, c.length);
                    }
                }
                return "";
            }
            
            
            // obtain plugin
            var cc = initCookieConsent();
            // run plugin with your configuration
            cc.run({
                current_lang: 'en',
                autoclear_cookies: true, // default: false
                page_scripts: true,
                // ...
                gui_options: {
                    consent_modal: {
                        layout: 'cloud', // box/cloud/bar
                        position: 'bottom center', // bottom/middle/top + left/right/center
                        transition: 'slide', // zoom/slide
                        swap_buttons: false // enable to invert buttons
                    },
                    settings_modal: {
                        layout: 'box', // box/bar
                        // position: 'left',           // left/right
                        transition: 'slide' // zoom/slide
                    }
                },
               
                onChange: function(cookie, changed_preferences) {},
                onAccept: function(cookie) {
                    
                    if (!getCookie('cookie_consent_logged')) {
                        var cookie = cookie.level;
                        $.ajax({
                            url: '<?php echo e(route('cookie-consent')); ?>',
                            datType: 'json',
                            data: {
                                cookie: cookie,
                            },
                        })
                        setCookie('cookie_consent_logged', '1', 182, '/');
                    }
                },
                
                languages: {
                    'en': {
                        consent_modal: {
                            title: '<?php echo e(!empty($setting['cookie_title']) ? $setting['cookie_title'] : ''); ?>',
                            description: '<?php echo e(!empty($setting['cookie_description']) ? $setting['cookie_description'] : ''); ?> <button type="button" data-cc="c-settings" class="cc-link">Let me choose</button>',
                            primary_btn: {
                                text: 'Accept all',
                                role: 'accept_all' // 'accept_selected' or 'accept_all'
                            },
                            secondary_btn: {
                                text: 'Reject all',
                                role: 'accept_necessary' // 'settings' or 'accept_necessary'
                            },
                        },
                        settings_modal: {
                            title: 'Cookie preferences',
                            save_settings_btn: 'Save settings',
                            accept_all_btn: 'Accept all',
                            reject_all_btn: 'Reject all',
                            close_btn_label: 'Close',
                            cookie_table_headers: [{
                                col1: 'Name'
                            },
                            {
                                col2: 'Domain'
                                },
                                {
                                    col3: 'Expiration'
                                },
                                {
                                    col4: 'Description'
                                }
                            ],
                            blocks: [{
                                title: '<?php echo e(!empty($setting['cookie_title']) ? $setting['cookie_title'] : ''); ?>',
                                description: '<?php echo e(!empty($setting['cookie_description']) ? $setting['cookie_description'] : ''); ?> <a href="#" class="cc-link">privacy policy</a>.'
                            }, {
                                title: '<?php echo e(!empty($setting['strictly_cookie_title']) ? $setting['strictly_cookie_title'] : ''); ?>',
                                description: '<?php echo e(!empty($setting['strictly_cookie_description']) ? $setting['strictly_cookie_description'] : ''); ?>',
                                toggle: {
                                    value: 'necessary',
                                    enabled: true,
                                    readonly: true // cookie categories with readonly=true are all treated as "necessary cookies"
                                }
                            }, {
                                title: 'More information',
                                description: '<?php echo e(!empty($setting['more_information_description']) ? $setting['more_information_description'] : ''); ?> <a class="cc-link" href="<?php echo e(!empty($setting['contactus_url']) ? $setting['contactus_url'] : ''); ?>"></a>.',
                            }]
                        }
                    }
                }
                
            });
        </script><?php /**PATH C:\laragon\www\hrms\resources\views/layouts/cookie_consent.blade.php ENDPATH**/ ?>