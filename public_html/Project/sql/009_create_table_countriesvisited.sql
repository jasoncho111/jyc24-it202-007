-- Many to many relation- many users can have visited many countries
CREATE TABLE IF NOT EXISTS  `CountriesVisited`
(
    `id`         int auto_increment not null,
    `userid`        INT NOT NULL,
    `country_name`    VARCHAR(255) NOT NULL,
    `created`    timestamp default current_timestamp,
    `modified`   timestamp default current_timestamp on update current_timestamp,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`userid`) REFERENCES Users(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`country_name`) REFERENCES Countries(`country_name`) ON DELETE CASCADE ON UPDATE CASCADE,
    UNIQUE KEY (`userid`, `country_name`)
)