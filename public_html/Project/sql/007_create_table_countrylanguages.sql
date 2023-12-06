CREATE TABLE IF NOT EXISTS  `CountryLanguages`
(
    `id`         int auto_increment not null,
    `country_name`    VARCHAR(255),
    `language`      VARCHAR(255),
    `created`    timestamp default current_timestamp,
    `modified`   timestamp default current_timestamp on update current_timestamp,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`country_name`) REFERENCES Countries(`country_name`) ON DELETE CASCADE ON UPDATE CASCADE,
    UNIQUE KEY (`country_name`, `language`)
)