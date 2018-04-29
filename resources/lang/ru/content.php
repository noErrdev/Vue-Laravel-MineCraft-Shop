<?php

return [
    'frontend' => [
        'auth' => [
            'login' => [
                'title' => 'Вход',
                'login' => 'Войти',
                'purchase_without_auth' => 'Покупка без авторизации',
                'forgot_password' => 'Забыли пароль?',
                'logout' => 'Выйти'
            ],
            'register' => [
                'title' => 'Регистрация',
                'btn' => 'Зарегистрироваться'
            ],
            'activation' => [
                'sent' => [
                    'title' => 'Ожидание активации',
                    'short_title' => 'Ожидание',
                    'description' => 'На почтовый ящик, указанный вами, отправлено письмо для подтверждения регистрации.
                              <p><p>Если письмо не пришло, вы можете отправить его заново.</p></p>',
                    'repeat' => 'Отправить повторно'
                ]
            ],
            'password' => [
                'forgot' => [
                    'title' => 'Сброс пароля',
                    'continue' => 'Продолжить'
                ],
                'reset' => [
                    'title' => 'Сбросить пароль',
                    'btn' => 'Сбросить'
                ]
            ],
            'servers' => [
                'title' => 'Выбор сервера'
            ]
        ],
        'shop' => [
            'layout' => [
                'server_not_selected' => 'Не выбран'
            ],
            'catalog' => [
                'title' => 'Каталог товаров',
                'categories_does_not_exists' => 'Категории отсутствуют',
                'empty_category' => 'Категория пуста',
                'item' => [
                    'enchanted' => 'Этот предмет зачарован',
                    'put_in_cart' => 'В корзину',
                    'already_in_cart' => 'Уже в корзине',
                    'about' => 'Информация о товаре',
                    'go_to_product' => 'Перейти к товару',
                    'go_to_item' => 'Перейти к предмету',
                    'quick_purchase' => 'Быстрая покупка',
                    'stack_item' => 'за :stack шт.',
                    'stack_permgroup' => 'на :stack дн.',
                    'stack_permgroup_forever' => 'навсегда'
                ],
                'purchase' => [
                    'title' => 'Быстрая покупка (:product)',
                    'username_description' => 'Этому пользователю будет выдан приобретенный товар',
                    'amount' => 'Количество товара',
                    'duration' => 'Длительность',
                    'cost' => 'К оплате: :cost :currency',
                    'not_enough' => 'На вашем счету недостаточно средств. После нажатия кнопки "оформить" вы
                        будете автоматически перенаправлены на страницу выбора способа оплаты.',
                    'not_auth' => 'После нажатия кнопки "оформить" вы
                        будете автоматически перенаправлены на страницу выбора способа оплаты.',
                    'purchase' => 'Оформить'
                ],
                'about' => [
                    'title' => 'Информация о товаре (:product)',
                    'description' => [
                        'empty' => 'Описание товара отсутствует',
                        'title' => 'Описание товара:'
                    ],
                    'type' => 'Тип:',
                    'enchantments' => 'Зачарован:'
                ]
            ],
            'cart' => [
                'title' => 'Корзина',
                'empty' => 'Корзина пуста',
                'item' => [
                    'remove' => 'Убрать',
                    'cost' => 'Стоимость:',
                    'forever' => 'Этот товар приобретается навсегда'
                ]
            ],
            'payment' => [
                'title' => 'Оплата покупки',
                'title_content' => 'Оплата покупки. Выберите способ оплаты:',
                'methods_not_available' => 'Нет доступных способов оплаты.'
            ]
        ],
        'profile' => [
            'character' => [
                'title' => 'Персонаж',
                'upload' => 'Обновить',
                'skin' => [
                    'image_resolutions' => 'Вы можете загружать изображения скинов со следующим(и) разрешениями: :resolutions.',
                    'file_size' => 'Максимальный размер файла скина: :size КБ.'
                ],
                'cloak' => [
                    'not_set' => 'Плащ не установлен',
                    'image_resolutions' => 'Вы можете загружать изображения плащей со следующим(и) разрешениями: :resolutions.',
                    'file_size' => 'Максимальный размер файла плаща: :size КБ.'
                ]
            ],
            'settings' => [
                'title' => 'Настройки',
                'password_change' => [
                    'title' => 'Сменить пароль',
                    'new' => 'Новый пароль',
                    'new_confirmation' => 'Повторите новый пароль'
                ],
                'login_reset' => [
                    'title' => 'Сброс логин-сессий',
                    'description' => 'После нажатия на кнопку ниже, все логин-сессии (В том числе, и текущая) будут сброшены. Это может оказаться полезным в случае, если вы хотите выйти из аккаунта на устройствах, к которым нет доступа.',
                    'reset' => 'Сбросить'
                ]
            ],
            'purchases' => [
                'title' => 'История покупок',
                'table' => [
                    'headers' => [
                        'id' => 'Идентификатор',
                        'cost' => 'Сумма',
                        'created_at' => 'Оформлена',
                        'completed_at' => 'Завершен',
                        'via' => 'Способ'
                    ],
                    'type' => [
                        'products' => 'Покупка товаров',
                        'refill' => 'Пополнение баланса'
                    ],
                    'empty' => 'Список покупок пуст'
                ],
                'details' => [
                    'title' => 'Список товаров',
                    'table' => [
                        'headers' => [
                            'name' => 'Название',
                            'image' => 'Изображение',
                            'stack' => 'Продается по',
                            'amount' => 'Товара приобретено',
                            'cost' => 'Стоимость'
                        ]
                    ]
                ],
                'via' => [
                    'by_admin' => 'Завершена администратором'
                ]
            ],
            'cart' => [
                'title' => 'Внутриигровая корзина',
                'any_server' => 'Любой',
                'table' => [
                    'headers' => [
                        'name' => 'Название',
                        'amount' => 'Количество/длительность'
                    ],
                    'empty' => 'Список предметов пуст'
                ]
            ]
        ],
        'news' => [
            //
        ]
    ],
    'admin' => [
        'control' => [
            'basic' => [
                'basic_section' => 'Основная информация о магазине',
                'title' => 'Основные настройки',
                'name' => 'Название',
                'description' => 'Описание',
                'keywords' => 'Ключевые слова',
                'users_section' => 'Пользователи',
                'access_mode' => [
                    'title' => 'Режим доступа',
                    'guest' => 'Только гости',
                    'auth' => 'Только авторизованные пользователи',
                    'any' => 'И гости и авторизованные пользователи',
                ],
                'enable_register' => 'Разрешить регистрацию новых пользователей',
                'enable_send_activations' => 'Включить отправку писем на почту пользователям для подтверждения аккаунта',
                'custom_url_after_register' => 'Перенаправлять пользователя на кастомный URL после регистрации',
                'skin_cloak_section' => 'Скины и плащи',
                'skin_enabled' => 'Разрешить пользователям устанавливать скины',
                'hd_skin_enabled' => 'Разрешить пользователям устанавливать HD скины',
                'cloak_enabled' => 'Разрешить пользователям устанавливать плащи',
                'hd_cloak_enabled' => 'Разрешить пользователям устанавливать HD плащи',
                'max_skin_file_size' => 'Максимальный размер файла скина (КБ)',
                'max_cloak_file_size' => 'Максимальный размер файла плаща (КБ)',
                'skin_sizes' => 'Допустимые размеры изображения скина',
                'skin_sizes_hd' => 'Допустимые размеры изображения HD скина',
                'cloak_sizes' => 'Допустимые размеры изображения плаща',
                'cloak_sizes_hd' => 'Допустимые размеры изображения HD плаща',

                'catalog_section' => 'Каталог',
                'catalog_per_page' => 'Количество товаров на 1 странице каталога',
                'sort_products' => [
                    'title' => 'Сортировать товары в катлоге',
                    'by_name' => 'По названию предмета (А -> Я)',
                    'by_name_desc' => 'По названию предмета (Я -> А)',
                    'by_priority' => 'По приоритету сортировки (1 -> N)',
                    'by_priority_desc' => 'По приоритету сортировки (N -> 1)',
                ],

                'news_section' => 'Новости',
                'news_enabled' => 'Включить показ новостей',
                'news_per_portion' => 'Количество подгружаемых за раз новостей',

                'monitoring_section' => 'Мониторинг серверов',
                'monitoring_enabled' => 'Включить мониторинг серверов',
                'monitoring_rcon_timeout' => 'Таймаут RCON соединения (сек.)',
                'monitoring_rcon_command' => 'Команда получения списка игроков',
                'monitoring_rcon_response_pattern' => 'Регулярное выражение разбора ответа сервера',

                'service_section' => 'Сервис',
                'maintenance_mode_enabled' => 'Включить режим обслуживания'
            ],
            'payments' => [
                'title' => 'Настройки платежей',
                'basic_section' => 'Общее',
                'min_fill_balance_sum' => 'Минимальная сумма пополнения баланса',
                'aggregators_section' => 'Платежные агрегаторы',
                'robokassa' => [
                    'title' => 'Robokassa',
                    'enabled' => 'Использователь Robokassa',
                    'login' => 'Логин',
                    'payment_password' => 'Пароль #1',
                    'validation_password' => 'Пароль #2',
                    'algorithm' => 'Алгоритм расчёта контрольной суммы',
                    'test' => 'Тестовый режим'
                ],
                'interkassa' => [
                    'title' => 'Interkassa',
                    'enabled' => 'Использовать Interkassa',
                    'key' => 'Ключ',
                    'checkout_id' => 'Идентификатор кассы',
                    'test_key' => 'Тестовый ключ',
                    'currency' => 'Валюта',
                    'algorithm' => 'Алгоритм расчёта контрольной суммы',
                    'test' => 'Тестовый режим'
                ]
            ],
            'security' => [
                'title' => 'Безопаснсть',
                'recaptcha' => [
                    'title' => 'reCAPTCHA',
                    'public_key' => 'Публичный ключ',
                    'secret_key' => 'Секретный ключ'
                ],
                'user_section' => 'Пользователь',
                'reset_password_enabled' => 'Разрешить пользователю "сбрасывать" пароль',
                'change_password_enabled' => 'Разрешить пользователю менять пароль от своего аккаунта',
            ],
            'optimization' => [
                'title' => 'Оптимизация',
                'caching_section' => 'Кеширование',
                'monitoring_ttl' => 'Время существования кэша мониторинга серверов (минут)',
            ]
        ],
        'products' => [
            'add' => [
                'title' => 'Добавить товар',
                'item' => 'Предмет',
                'server' => 'Сервер, к которому будет привязан товар',
                'category' => 'Категория, к которой будет привязан товар',
                'no_categories' => 'На выбранном сервере отсутствуют категории',
                'item_stack' => 'Количество товара в 1 стаке',
                'permgroup_stack' => 'Длительность привилегии',
                'forever' => 'Привилегия приобретается навсегда',
                'price' => 'Цена за 1 стак товара',
                'sort_priority' => 'Приоритет сортировки товара в каталоге',
                'hide' => 'Скрыть товар из каталога',
                'finish' => 'Завершить добавление товара'
            ],
            'edit' => [
                'title' => 'Редактирование товара',
                'finish' => 'Завершить редактирование товара'
            ],
            'list' => [
                'title' => 'Список товаров',
                'search' => 'Поиск по товарам',
                'table' => [
                    'headers' => [
                        'id' => 'Идентификатор',
                        'price' => 'Цена',
                        'stack' => 'Количество/Длительность',
                        'image' => 'Изображение предмета',
                        'item' => 'Название предмета',
                        'type' => 'Тип предмета'
                    ],
                    'empty' => 'Список предметов пуст'
                ],
                'delete' => 'Вы уверены, что хотите удалить этот товар?'
            ]
        ],
        'items' => [
            'add' => [
                'title' => 'Добавить предмет',
                'name' => 'Название предмета',
                'description' => 'Описание предмета',
                'item' => [
                    'id' => 'Внутриигровой идентификатор предмета'
                ],
                'permgroup' => [
                    'id' => 'Внутриигровой идентификатор привилегии'
                ],
                'image' => [
                    'default' => 'Стандартное',
                    'upload' => 'Загрузить',
                    'browse' => 'Обзор'
                ],
                'browser' => [
                    'title' => 'Изображения предметов в файловой системе сервера',
                    'select' => 'Выбрать изображение',
                    'name' => 'Имя файла'
                ],
                'enchantment' => [
                    'title' => 'Стол зачарования',
                    'description' => 'Выберите интенсивность нужных чар и закройте диалоговое окно. Помните, большинство чар могут сочетаться только с определенными чарами.'
                ],
                'extra' => 'Extra',
                'finish' => 'Завершить создание'
            ],
            'edit' => [
                'title' => 'Редактирование предмета',
                'finish' => 'Завершить редактирование',
                'image' => [
                    'current' => 'Текущее'
                ]
            ],
            'list' => [
                'title' => 'Список предметов',
                'search' => 'Поиск по предметам',
                'table' => [
                    'headers' => [
                        'id' => 'Идентификтаор',
                        'name' => 'Название'
                    ],
                    'loading' => 'Информация о предметах загружается...',
                    'empty' => 'Список предметов пуст'
                ],
                'delete' => 'Вы уверены, что хотите удалить предмет ":name"?'
            ],
        ],
        'news' => [
            'add' => [
                //
            ],
            'list' => [
                'title' => 'Список новостей',
                'search' => 'Поиск по новостям',
                'table' => [
                    'headers' => [
                        'id' => 'Идентификтаор',
                        'title' => 'Заголовок',
                        'username' => 'Автор новости',
                        'created_at' => 'Дата и время создания'
                    ],
                    'loading' => 'Информация о новостях загружается...',
                    'empty' => 'Список новостей пуст'
                ]
            ],
        ],
        'pages' => [
            'add' => [
                'title' => 'Добавить статическую страницу',
                'title_input' => 'Заголовок статической страницы',
                'content' => 'Содержимое страницы',
                'url' => 'Адрес страницы',
                'url_auto' => 'Сгенерировать адрес автоматически',
                'finish' => 'Завершить создание'
            ],
            'edit' => [
                'title' => 'Редактировать статическую страницу'
            ],
            'list' => [
                'title' => 'Список статических страниц',
                'search' => 'Поиск по статическим страницам',
                'table' => [
                    'headers' => [
                        'id' => 'Идентификтаор',
                        'title' => 'Заголовок',
                        'url' => 'Адрес страницы'
                    ],
                    'loading' => 'Информация о статических страницах загружается...',
                    'empty' => 'Список статических страницах пуст'
                ],
                'delete' => 'Вы уверены, что хотите удалить статическую страницу?'
            ],
        ],
        'users' => [
            'edit' => [
                'main' => [
                    'title' => 'Редактировать пользователя',
                    'new_password' => 'Новый пароль',
                    'roles' => 'Роли пользователя',
                    'permissions' => 'Права пользователя',
                    'finish' => 'Завершить редактирование',
                ],
                'actions' => [
                    'title' => 'Действия с пользователем',
                    'activated_at' => 'Пользователь активирован :datetime.',
                    'banned' => 'Пользователь заблокирован',
                    'show_bans_history' => 'Просмотр истории блокировок',
                    'bans_history' => [
                        'title' => 'История блокировок пользователя :username',
                        'created_at' => 'Дата выдачи блокировки',
                        'until' => 'Дата окончания блокировки',
                        'reason' => 'Причина',
                        'delete' => 'Вы уверены, что хотите удалить блокировку?',
                        'caption' => 'неистекшие блокировки'
                    ],
                    'show_ban_dialog' => 'Заблокировать пользователя',
                    'show_add_ban_dialog' => 'Добавить блокировку пользователю',
                    'add_ban' => [
                        'forever' => 'Заблокировать навсегда',
                        'duration' => 'Длительность',
                        'concrete' => 'Конкретно',
                        'in_days' => 'В днях',
                        'days' => 'Длительность блокировки в днях',
                        'date' => 'Дата окончания блокировки',
                        'time' => 'Время окончания блокировки',
                        'datetime' => 'Дата и время окончания блокировки',
                        'reason' => 'Причина',
                        'finish' => 'Заблокировать'
                    ]
                ]
            ],
            'list' => [
                'title' => 'Список пользователей',
                'search' => 'Поиск по пользователям',
                'table' => [
                    'headers' => [
                        'id' => 'Идентификатор',
                        'states' => 'Состояния'
                    ],
                    'activated' => 'Аккаунт этого пользователя активирован',
                    'banned' => 'Этот пользователь заблокирован',
                    'loading' => 'Информация о пользователяях загружается...',
                    'empty' => 'Список пользователей пуст'
                ],
                'delete' => 'Вы уверены, что хотите удалить пользователя?'
            ]
        ],
        'other' => [
            'rcon' => [
                'title' => 'RCON - консоль'
            ],
            'debug' => [
                'title' => 'Отладка',
                'email' => [
                    'title' => 'Тестовое письмо',
                    'description' => 'Тестовое письмо поможет проверить то, как работает функция отправки email.',
                    'address' => 'Адрес электронной почты, на который будет отправленно письмо',
                    'success' => 'Отправка произведена успешна. Проверьте электронную почту.',
                    'failure' => 'При отправке письма произошла следующая ошибка:',
                    'invalid_address' => 'Невалидный адрес'
                ]
            ]
        ],
        'statistic' => [
            'show' => [
                'title' => 'Просмотр статистики',
                'profit_for_year' => 'Динамика получения прибыли за несколько лет',
                'profit_for_month' => 'Динамика получения прибыли за месяц',
                'purchases_for_year' => 'Динамика совершения заказов за несколько лет',
                'purchases_for_month' => 'Динамика совершения заказов за месяц',
                'registered_for_year' => 'Динамика регистрации пользователей за несколько лет',
                'registered_for_month' => 'Динамика регистрации пользователей за месяц',
                'top_purchased_products' => 'Больше всего покупают',
                'table' => [
                    'title' => 'Общие показатели проекта',
                    'headers' => [
                        'name' => 'Наименование показателя',
                        'value' => 'Значение показателя',
                    ],
                    'items' => [
                        'profit' => 'Общая прибыль',
                        'amount_purchases' => 'Заказов совершено',
                        'amount_fill_balance' => 'Количество пополнений баланса',
                        'users_registered' => 'Пользователей зарегистрировано'
                    ]
                ]
            ],
            'purchases' => [
                'title' => 'История покупок пользователей'
            ]
        ],
        'information' => [
            'about' => [
                'title' => 'О системе L-Shop',
                'description' => '<strong>L - Shop</strong> - это проект с открытым исходным кодом, целая система,
                призванная помочь администраторам игровых серверов Minecraft упростить процесс продажи виртуальных товаров.',
                'version' => 'Версия :version',
                'lshop_version' => 'Версия L-Shop: :version',
                'developers_title' => 'Разработчики',
                'developers' => [
                    'D3lph1' => [
                        'name'  => 'Богдан',
                        'description' => [
                            'plain' => 'Программный код: backend и frontend. Вы можете обратиться ко мне за техничекой поддержкой, а так же для заказа разработки различного программного обеспечения.',
                            'html' => '<span class="text--primary">Программный код: backend и frontend.</span> Вы можете обратиться ко мне за техничекой поддержкой, а так же для заказа разработки различного программного обеспечения.'
                        ]
                    ],
                    'WhileD0S' => [
                        'name' => 'Михаил',
                        'description' => [
                            'plain' => 'Дизайн и верстка. Вы можете обратиться ко мне для того, чтобы заказть разработку уникального дизайна для вашего сайта, в том числе, для сайта, базирующегося на системе L-Shop.',
                            'html' => '<span class="text--primary">Дизайн и верстка.</span> Вы можете обратиться ко мне для того, чтобы заказть разработку уникального дизайна для вашего сайта, в том числе, для сайта, базирующегося на системе L-Shop.'
                        ]
                    ]
                ]
            ]
        ]
    ],
    'layout' => [
        'shop' => [
            'server' => 'Сервер:',
            'sidebar' => [
                'basic' => [
                    'catalog' => 'Каталог',
                    'cart' => 'Корзина',
                    'servers' => 'К выбору серверов'
                ],
                'profile' => [
                    'title' => 'Профиль',
                    'character' => 'Персонаж',
                    'settings' => 'Настройки',
                    'information' => [
                        'title' => 'Информация',
                        'sub_items' => [
                            'purchases' => 'История покупок',
                            'cart' => 'Внутриигровая корзина'
                        ]
                    ]
                ],
                'admin' => [
                    'title' => 'Администрирование',
                    'control' => [
                        'title' => 'Управление',
                        'sub_items' => [
                            'main_settings' => 'Основные настройки',
                            'payments' => 'Настройки платежей',
                            'api' => 'API',
                            'security' => 'Безопасность',
                            'optimization' => 'Оптимизация'
                        ]
                    ],
                    'servers' => [
                        'title' => 'Серверы',
                        'sub_items' => [
                            'add' => 'Добавить',
                            'edit' => 'Редактировать'
                        ]
                    ],
                    'products' => [
                        'title' => 'Товары',
                        'sub_items' => [
                            'add' => 'Добавить',
                            'edit' => 'Редактировать'
                        ]
                    ],
                    'items' => [
                        'title' => 'Предметы',
                        'sub_items' => [
                            'add' => 'Добавить',
                            'edit' => 'Редактировать'
                        ]
                    ],
                    'news' => [
                        'title' => 'Новости',
                        'sub_items' => [
                            'add' => 'Добавить',
                            'edit' => 'Редактировать'
                        ]
                    ],
                    'pages' => [
                        'title' => 'Статические страницы',
                        'sub_items' => [
                            'add' => 'Добавить',
                            'edit' => 'Редактировать'
                        ]
                    ],
                    'users' => [
                        'title' => 'Пользователи',
                        'sub_items' => [
                            'edit' => 'Редактировать'
                        ]
                    ],
                    'other' => [
                        'title' => 'Другое',
                        'sub_items' => [
                            'rcon' => 'RCON - консоль',
                            'debug' => 'Отладка',
                        ]
                    ],
                    'statistic' => [
                        'title' => 'Статистика',
                        'sub_items' => [
                            'show' => 'Просмотр статистики',
                            'payments' => 'История покупок'
                        ]
                    ],
                    'info' => [
                        'title' => 'Информация',
                        'sub_items' => [
                            'docs' => 'Документация',
                            'about' => 'О системе L-Shop',
                        ]
                    ]
                ]
            ],
            'settings' => [
                'title' => 'Локальные настройки'
            ],
            'monitoring' => [
                'title' => 'Мониторинг серверов',
                'disabled' => 'Отключен',
                'failed' => 'Ошибка'
            ]
        ],
        'news' => [
            'empty' => 'Новости отсутствуют',
            'read' => 'Читать полностью',
            'load' => 'Загрузить ещё'
        ]
    ]
];
