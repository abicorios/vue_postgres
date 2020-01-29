-- Adminer 4.7.5 PostgreSQL dump

DROP TABLE IF EXISTS "messages";
DROP SEQUENCE IF EXISTS messages_id_seq;
CREATE SEQUENCE messages_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 START 1 CACHE 1;

CREATE TABLE "public"."messages" (
    "id" integer DEFAULT nextval('messages_id_seq') NOT NULL,
    "message" text NOT NULL
) WITH (oids = false);

INSERT INTO "messages" ("id", "message") VALUES
(1,	'Hello World'),
(2,	'Second message'),
(3,	'Third message');

-- 2020-01-29 11:21:11.66451+00
