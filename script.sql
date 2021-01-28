create table notes
(
    id         bigint unsigned auto_increment
        primary key,
    title      varchar(255) not null,
    content    text         not null,
    created_at timestamp    null,
    updated_at timestamp    null,
    deleted_at timestamp    null
)
    collate = utf8mb4_unicode_ci;

create table archived_notes
(
    id         bigint unsigned auto_increment
        primary key,
    newest_id  bigint unsigned not null,
    title      varchar(255)    not null,
    content    text            not null,
    created_at timestamp       null,
    updated_at timestamp       null,
    deleted_at timestamp       null,
    constraint archived_notes_newest_id_foreign
        foreign key (newest_id) references notes (id)
            on delete cascade
)
    collate = utf8mb4_unicode_ci;
