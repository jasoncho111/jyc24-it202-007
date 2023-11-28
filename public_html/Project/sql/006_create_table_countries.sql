CREATE TABLE IF NOT EXISTS `Countries`
(
    `id`         int auto_increment not null,
    `country_name`    VARCHAR(255) NOT NULL,
    `capital`       VARCHAR(255),
    `currency_name`  VARCHAR(255) NOT NULL,
    `is_independent` BOOLEAN NOT NULL,
    `is_un_member` BOOLEAN,
    `population`    INT,
    `is_real` BOOLEAN DEFAULT TRUE,
    `is_active`  TINYINT(1) default 1,
    `created`    timestamp default current_timestamp,
    `modified`   timestamp default current_timestamp on update current_timestamp,
    PRIMARY KEY (`id`),
    UNIQUE KEY (`country_name`)
)