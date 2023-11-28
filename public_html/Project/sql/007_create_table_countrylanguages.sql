CREATE TABLE IF NOT EXISTS  `CountryLanguages`
(
    `id`         int auto_increment not null,
    `country_id`    int,
    `language`      VARCHAR(255),
    `created`    timestamp default current_timestamp,
    `modified`   timestamp default current_timestamp on update current_timestamp,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`country_id`) REFERENCES Countries(`id`),
    UNIQUE KEY (`country_id`, `language`)
)