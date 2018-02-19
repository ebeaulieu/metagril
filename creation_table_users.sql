-- DROP TABLE public.users;
CREATE TABLE public.users (
uid SERIAL,
username character varying NOT NULL UNIQUE,
password character varying NOT NULL,
email character varying NOT NULL,
first_name character varying NOT NULL,
last_name character varying NOT NULL
);

GRANT SELECT, INSERT, UPDATE, DELETE ON public.users TO postgres;
GRANT USAGE ON SEQUENCE public.users_uid_seq TO postgres;
INSERT INTO public.users (username, password, email, first_name, last_name) VALUES('ebeaulieu', 'ebeaulieu', 'eric.g.beaulieu@umontreal.ca', 'Eric', 'Beaulieu');
INSERT INTO public.users (username, password, email, first_name, last_name) VALUES('mbotrel', 'mbotrel', 'morgan.botrel@umontreal.ca', 'Morgan', 'Botrel');
SELECT username, first_name, last_name FROM public.users ORDER BY username; 
