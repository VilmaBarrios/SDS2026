--
-- PostgreSQL database dump
--

\restrict 6XliExiN6h2aa1fXviSodrkmopRCrbcSKjuCQWLVF8FJ0brVbeeTxxSj6fGns7o

-- Dumped from database version 17.11 (Debian 17.11-1.pgdg13+2)
-- Dumped by pg_dump version 17.11 (Debian 17.11-1.pgdg13+2)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

ALTER TABLE IF EXISTS ONLY public.posts DROP CONSTRAINT IF EXISTS posts_user_id_foreign;
ALTER TABLE IF EXISTS ONLY public.posts DROP CONSTRAINT IF EXISTS posts_category_id_foreign;
ALTER TABLE IF EXISTS ONLY public.post_images DROP CONSTRAINT IF EXISTS post_images_post_id_foreign;
DROP INDEX IF EXISTS public.sessions_user_id_index;
DROP INDEX IF EXISTS public.sessions_last_activity_index;
DROP INDEX IF EXISTS public.jobs_queue_index;
DROP INDEX IF EXISTS public.failed_jobs_connection_queue_failed_at_index;
DROP INDEX IF EXISTS public.cache_locks_expiration_index;
DROP INDEX IF EXISTS public.cache_expiration_index;
ALTER TABLE IF EXISTS ONLY public.users DROP CONSTRAINT IF EXISTS users_pkey;
ALTER TABLE IF EXISTS ONLY public.users DROP CONSTRAINT IF EXISTS users_email_unique;
ALTER TABLE IF EXISTS ONLY public.sessions DROP CONSTRAINT IF EXISTS sessions_pkey;
ALTER TABLE IF EXISTS ONLY public.posts DROP CONSTRAINT IF EXISTS posts_pkey;
ALTER TABLE IF EXISTS ONLY public.post_images DROP CONSTRAINT IF EXISTS post_images_pkey;
ALTER TABLE IF EXISTS ONLY public.password_reset_tokens DROP CONSTRAINT IF EXISTS password_reset_tokens_pkey;
ALTER TABLE IF EXISTS ONLY public.migrations DROP CONSTRAINT IF EXISTS migrations_pkey;
ALTER TABLE IF EXISTS ONLY public.jobs DROP CONSTRAINT IF EXISTS jobs_pkey;
ALTER TABLE IF EXISTS ONLY public.job_batches DROP CONSTRAINT IF EXISTS job_batches_pkey;
ALTER TABLE IF EXISTS ONLY public.failed_jobs DROP CONSTRAINT IF EXISTS failed_jobs_uuid_unique;
ALTER TABLE IF EXISTS ONLY public.failed_jobs DROP CONSTRAINT IF EXISTS failed_jobs_pkey;
ALTER TABLE IF EXISTS ONLY public.categories DROP CONSTRAINT IF EXISTS categories_pkey;
ALTER TABLE IF EXISTS ONLY public.cache DROP CONSTRAINT IF EXISTS cache_pkey;
ALTER TABLE IF EXISTS ONLY public.cache_locks DROP CONSTRAINT IF EXISTS cache_locks_pkey;
ALTER TABLE IF EXISTS public.users ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.posts ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.post_images ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.migrations ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.jobs ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.failed_jobs ALTER COLUMN id DROP DEFAULT;
ALTER TABLE IF EXISTS public.categories ALTER COLUMN id DROP DEFAULT;
DROP SEQUENCE IF EXISTS public.users_id_seq;
DROP TABLE IF EXISTS public.users;
DROP TABLE IF EXISTS public.sessions;
DROP SEQUENCE IF EXISTS public.posts_id_seq;
DROP TABLE IF EXISTS public.posts;
DROP SEQUENCE IF EXISTS public.post_images_id_seq;
DROP TABLE IF EXISTS public.post_images;
DROP TABLE IF EXISTS public.password_reset_tokens;
DROP SEQUENCE IF EXISTS public.migrations_id_seq;
DROP TABLE IF EXISTS public.migrations;
DROP SEQUENCE IF EXISTS public.jobs_id_seq;
DROP TABLE IF EXISTS public.jobs;
DROP TABLE IF EXISTS public.job_batches;
DROP SEQUENCE IF EXISTS public.failed_jobs_id_seq;
DROP TABLE IF EXISTS public.failed_jobs;
DROP SEQUENCE IF EXISTS public.categories_id_seq;
DROP TABLE IF EXISTS public.categories;
DROP TABLE IF EXISTS public.cache_locks;
DROP TABLE IF EXISTS public.cache;
SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: cache; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cache (
    key character varying(255) NOT NULL,
    value text NOT NULL,
    expiration bigint NOT NULL
);


ALTER TABLE public.cache OWNER TO postgres;

--
-- Name: cache_locks; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cache_locks (
    key character varying(255) NOT NULL,
    owner character varying(255) NOT NULL,
    expiration bigint NOT NULL
);


ALTER TABLE public.cache_locks OWNER TO postgres;

--
-- Name: categories; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categories (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.categories OWNER TO postgres;

--
-- Name: categories_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categories_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.categories_id_seq OWNER TO postgres;

--
-- Name: categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categories_id_seq OWNED BY public.categories.id;


--
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection character varying(255) NOT NULL,
    queue character varying(255) NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.failed_jobs_id_seq OWNER TO postgres;

--
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: job_batches; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.job_batches (
    id character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    total_jobs integer NOT NULL,
    pending_jobs integer NOT NULL,
    failed_jobs integer NOT NULL,
    failed_job_ids text NOT NULL,
    options text,
    cancelled_at integer,
    created_at integer NOT NULL,
    finished_at integer
);


ALTER TABLE public.job_batches OWNER TO postgres;

--
-- Name: jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.jobs (
    id bigint NOT NULL,
    queue character varying(255) NOT NULL,
    payload text NOT NULL,
    attempts smallint NOT NULL,
    reserved_at integer,
    available_at integer NOT NULL,
    created_at integer NOT NULL
);


ALTER TABLE public.jobs OWNER TO postgres;

--
-- Name: jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.jobs_id_seq OWNER TO postgres;

--
-- Name: jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.migrations_id_seq OWNER TO postgres;

--
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO postgres;

--
-- Name: post_images; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.post_images (
    id bigint NOT NULL,
    post_id bigint NOT NULL,
    path character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.post_images OWNER TO postgres;

--
-- Name: post_images_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.post_images_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.post_images_id_seq OWNER TO postgres;

--
-- Name: post_images_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.post_images_id_seq OWNED BY public.post_images.id;


--
-- Name: posts; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.posts (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    category_id bigint NOT NULL,
    title character varying(255) NOT NULL,
    date date NOT NULL,
    content text NOT NULL,
    authors character varying(255) NOT NULL,
    image character varying(255),
    status character varying(255) DEFAULT 'borrador'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT posts_status_check CHECK (((status)::text = ANY ((ARRAY['borrador'::character varying, 'publicado'::character varying])::text[])))
);


ALTER TABLE public.posts OWNER TO postgres;

--
-- Name: posts_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.posts_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.posts_id_seq OWNER TO postgres;

--
-- Name: posts_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.posts_id_seq OWNED BY public.posts.id;


--
-- Name: sessions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);


ALTER TABLE public.sessions OWNER TO postgres;

--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    role character varying(255) DEFAULT 'usuario'::character varying NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: categories id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories ALTER COLUMN id SET DEFAULT nextval('public.categories_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: post_images id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.post_images ALTER COLUMN id SET DEFAULT nextval('public.post_images_id_seq'::regclass);


--
-- Name: posts id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.posts ALTER COLUMN id SET DEFAULT nextval('public.posts_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: cache; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cache (key, value, expiration) FROM stdin;
\.


--
-- Data for Name: cache_locks; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cache_locks (key, owner, expiration) FROM stdin;
\.


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categories (id, name, created_at, updated_at) FROM stdin;
1	Ponencias	2026-11-19 23:51:35	2026-11-19 23:51:35
2	Talleres	2026-11-20 00:12:43	2026-11-20 00:12:43
3	Bingo	2026-11-20 00:17:57	2026-11-20 00:17:57
4	ExpoSDS26	2026-11-20 00:19:07	2026-11-20 00:19:07
5	Comelona de Pizza	2026-11-20 00:20:23	2026-11-20 00:20:23
6	FutSal	2026-11-20 00:22:48	2026-11-20 00:22:48
7	Parrillada	2026-11-20 00:23:28	2026-11-20 00:23:28
8	Momentos SDS2026	2026-11-20 00:24:38	2026-11-20 00:24:38
9	Dinamicas	2026-11-21 19:42:10	2026-11-21 19:42:10
10	inauguracion	2026-11-21 19:44:01	2026-11-21 19:44:01
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: job_batches; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.job_batches (id, name, total_jobs, pending_jobs, failed_jobs, failed_job_ids, options, cancelled_at, created_at, finished_at) FROM stdin;
\.


--
-- Data for Name: jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.jobs (id, queue, payload, attempts, reserved_at, available_at, created_at) FROM stdin;
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	0001_01_01_000000_create_users_table	1
2	0001_01_01_000001_create_cache_table	1
3	0001_01_01_000002_create_jobs_table	1
4	2026_11_18_000001_create_categories_table	1
5	2026_11_18_000002_create_posts_table	1
6	2026_11_20_001042_create_post_images_table	2
7	2026_11_20_003159_add_role_to_users_table	3
\.


--
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: post_images; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.post_images (id, post_id, path, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: posts; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.posts (id, user_id, category_id, title, date, content, authors, image, status, created_at, updated_at) FROM stdin;
2	2	1	Ponencia 1 - Del internet de las cosas a la investigacion aplicada	2026-11-16	El Mtro. Omar Otoniel Flores compartió la ponencia “Del Internet de las Cosas a la investigación aplicada: Tecnologías inteligentes para el monitoreo ambiental y agroproductivo”, en la que abordó cómo las herramientas tecnológicas y el Internet de las Cosas (IoT) pueden contribuir al desarrollo de soluciones innovadoras para el monitoreo del medio ambiente y los procesos agroproductivos. Una oportunidad para conocer cómo la tecnología puede ponerse al servicio de la sostenibilidad y el desarrollo.	Vilma Mercedes Barrios Reyes	posts/eSApJKtvLIQhIWPg4E11yzjgJoD1a83x7Uri1ely.jpg	publicado	2026-11-20 00:00:24	2026-11-21 19:55:58
4	1	9	La "Quevedo Aventuras"	2026-11-16	Como parte de las actividades de la Semana de Sistemas, se llevaron a cabo las dinámicas “Quevedo Aventuras”, un espacio lleno de diversión, entusiasmo y participación. A través de diversos juegos y retos, los asistentes tuvieron la oportunidad de poner a prueba sus habilidades, compartir momentos agradables y ganar diferentes premios, haciendo de la jornada una experiencia entretenida.	Vilma Mercedes Barrios Reyes	posts/T16UAe1b9trRkoeC6OlyKl7zb6UUQFqac9QIhFMB.jpg	publicado	2026-11-21 19:58:19	2026-11-21 19:58:19
5	1	1	Ponencia 2 -- Alternativas y Eficiencia energetica	2026-11-16	Como parte de las actividades de la Semana de Sistemas, se llevaron a cabo las dinámicas “Quevedo Aventuras”, un espacio lleno de diversión, entusiasmo y participación. A través de diversos juegos y retos, los asistentes tuvieron la oportunidad de poner a prueba sus habilidades, compartir momentos agradables y ganar diferentes premios, haciendo de la jornada una experiencia entretenida.	Vilma Mercedes Barrios Reyes	posts/Q5cMdezLIC0kUCKaEAp2aK3vKeb1BiXPR7zEOWaI.jpg	publicado	2026-11-21 20:00:21	2026-11-21 20:00:21
6	1	1	Ponencia 3 -- Eficiencia Energetica, Optimizacion de recursos y sostenibilidad aplicada a soluciones Tecnologicas	2026-11-17	El Lic. Nahum Alexander Sánchez nos presentó una interesante ponencia sobre cómo podemos aprovechar mejor la energía y los recursos a través de la tecnología. Como ejemplo, nos mostró cómo se pueden automatizar los aires acondicionados utilizando Internet de las Cosas (IoT), BACnet e Inteligencia Artificial, demostrando que la tecnología también puede ayudarnos a ahorrar energía y cuidar el medio ambiente.	Vilma Maria Gutierrez Juarez	posts/LgCqTKtbWpuyoTMg7IJtgZejOtTQSTWBWTtAUy4F.jpg	publicado	2026-11-21 20:04:04	2026-11-21 20:04:04
7	1	1	Ponencia 4 -- Ciberseguridad	2026-11-17	Durante esta ponencia, representantes de la empresa ESET compartieron sus conocimientos sobre la importancia de la ciberseguridad y cómo podemos proteger nuestra información en el mundo digital. También nos dieron a conocer algunos de los riesgos a los que estamos expuestos al navegar por Internet y consejos para mantener nuestros dispositivos y datos más seguros. Una actividad muy útil para recordar que la seguridad también es parte de la tecnología.	Vilma Maria Gutierrez Juarez	posts/WimdpxpdN8PRpNfJ0f6iikXq1izVet4uvUwJDllr.jpg	publicado	2026-11-21 20:06:39	2026-11-21 20:06:39
8	1	9	Dinamica de ciberseguridad	2026-11-17	Dinámica de Ciberseguridad\r\n\r\nDespués de la ponencia, los representantes de ESET realizaron una dinámica interactiva en la que los estudiantes pudieron ponerse en el papel de un hacker y aprender a identificar posibles amenazas digitales. A través de diferentes ejemplos y retos, los participantes pusieron a prueba sus conocimientos al reconocer correos falsos, identificar contraseñas seguras y descubrir algunos trucos utilizados para engañar a los usuarios. ¡Una actividad divertida que nos enseñó a estar más atentos y protegernos en Internet!	Vilma Maria Gutierrez Juarez	posts/eymXIlP5BZQdQsJmCBdAoVdx4ztY462KPSjsZhxi.jpg	publicado	2026-11-21 20:08:15	2026-11-21 20:08:15
3	1	10	Inauguracion de la semana de sistemas	2026-11-16	La Semana de Sistemas dio inicio con un acto de inauguración en el que se compartieron las palabras de bienvenida y se contó con la participación de autoridades académicas de la UES FMO, entre ellas la Vicedecana, el Jefe del Departamento, la Coordinadora de la Carrera y el Presidente de ASEIS. Este espacio marcó el comienzo de una semana dedicada al aprendizaje, la innovación y el intercambio de conocimientos bajo el lema Green IoT.	Vilma Mercedes Barrios Reyes	posts/DOBK8GcPYVJQrPtp79ouZjd50VUsPYhBW19xfhwi.jpg	publicado	2026-11-21 19:50:03	2026-11-21 20:10:43
9	1	2	Taller de Sostenibilidad y Análisis Energético mediante Electricity Maps	2026-11-17	Durante la jornada de la tarde, el Br. Josué González nos acompañó en un taller donde conocimos la herramienta Electricity Maps y cómo podemos utilizarla para observar de dónde proviene la energía que consumimos y su impacto en el medio ambiente. Fue un espacio práctico e interesante que nos permitió descubrir nuevas formas de relacionar la tecnología con el cuidado del planeta.	Vilma Maria Gutierrez Juarez	posts/O7HJClMzSLLKIfOpkDif77Hjg72vvSA7XS87w48l.jpg	publicado	2026-11-21 20:14:32	2026-11-21 20:14:32
10	1	3	Bingo	2026-11-18	El miércoles disfrutamos de una actividad diferente y llena de emoción con el Bingo. Los estudiantes podían crear su propio usuario, adquirir créditos y utilizarlos para participar en el juego. El objetivo era completar las figuras del cartón y ser el primero en gritar ¡Bingo! para ganar uno de los premios donados por los patrocinadores oficiales. Sin duda, fue un momento de mucha diversión y entusiasmo para todos los participantes.	Dayna Rebeca Moreno Santiago	posts/NqzZ1eOElImKSMp8S7W5Wuk2ZxvqMR0jcxXCINa5.jpg	publicado	2026-11-21 20:16:59	2026-11-21 20:16:59
11	1	9	Dinámicas y retos sorpresa	2026-11-18	Durante la jornada también se realizaron diferentes dinámicas para animar a los estudiantes y poner a prueba sus conocimientos. Entre ellas, hubo preguntas relacionadas con la carrera de Sistemas y divertidos retos en los que los participantes debían ser los primeros en llevar un artículo solicitado para ganar un premio. Estas actividades llenaron el ambiente de emoción, risas y mucha participación.	Dayna Rebeca Moreno Santiago	posts/PZnj1FfSeO5ST2gYcfmXSEzGryot1B4Y4QulRgZj.jpg	publicado	2026-11-21 20:20:44	2026-11-21 20:20:44
12	1	4	Feria de Logros	2026-11-19	La ExpoSystem2026 estuvo lleno de grandes e interesantes proyectos realizados por nuestros compañeros de Sistemas Informáticos, sin duda pusieron a prueba sus conocimientos y manos a la obra en desarrollar tecnologías eficientes y amigables con el medio ambiente.	Dayna Rebeca Moreno Santiago	posts/SGbfZBY7WgmGEnVzMw4lsdMV3IypagXx069Dp8Nw.jpg	publicado	2026-11-21 20:26:01	2026-11-21 20:26:01
13	1	4	Velocímetro con bicicleta	2026-11-19	Este proyecto consiste en calcular la velocidad a la que van las revoluciones por minuto y contiene un sensor de caídas; se realizó mediante un circuito integrado Arduino uno y una pantalla LCD que muestra datos en tiempo real.	Dayna Rebeca Moreno Santiago	posts/9nNnFeHsu3mGq2QVNW3o1CUiQL9aofpfHxfqAySf.jpg	publicado	2026-11-21 20:30:30	2026-11-21 20:30:30
31	1	8	La preparacion del chimol	2026-11-20	Que se note que cocinamos, el chimol nos quedó perfecto	Vilma Barrios, Vilma Gutierrez, Dayna Moreno	posts/01vSrtgmmsvRGMtehcQaL2D6wb2IMpJLyazXhomS.jpg	publicado	2026-11-21 21:16:37	2026-11-21 21:16:37
32	1	1	Permiso	2026-11-17	Adjuntamos el permiso del dia martes	Dayna Moreno, Vilma Barrios	posts/r7xU9ZhajV0y1N1grpiccWogjo0hH2xHrtEXGCLt.jpg	publicado	2026-11-21 21:20:06	2026-11-21 21:20:06
14	1	4	Anemómetro y Veleta	2026-11-19	El anemómetro es el encargado de medir la velocidad del viento, dependiendo de las revoluciones el aparato registra datos mediante sensores e imán y se muestran mediante una pantalla LCD los datos como la velocidad en km, RPM y numero de vueltas.\r\nLa veleta casera con Arduino Uno consiste en un sensor meteorológico artesanal que detecta la dirección  del viento mediante un eje giratorio y envía esa información en forma de señal eléctrica a la placa Arduino para convertirla en puntos cardinales (Norte, Sur, Este, Oeste)	Vilma Maria Gutierrez Juarez	posts/bmRhezbzQDJxUqoujKShql4Yh2A30oY4JBHTTgLK.jpg	publicado	2026-11-21 20:33:13	2026-11-21 20:33:13
15	1	4	Monitor de Deslizamientos	2026-11-19	Es un trabajo desarrollado con lenguaje de programación C++ en Arduino IDE, el cual nos ayuda a alertar sobre el riesgo de los deslizamientos, mediante un sensor de vibración que detecta los movimientos de la tierra y un sensor de balancín que detecta la inclinación del terreno que generó el movimiento de la tierra. Es un pequeño prototipo con el cual podemos observar la importancia de dicho sistema con el cual se pueden prevenir accidentes.	Vilma Maria Gutierrez Juarez	posts/aILjr23A6MZrvkOr0kNS7wChOiBZo5dZr595qveZ.jpg	publicado	2026-11-21 20:35:17	2026-11-21 20:35:17
16	1	4	Sistema de Monitoreo Solar	2026-11-19	Este sistema mide en tiempo real parámetros de voltaje de un panel solar, el cual se conecta a un sensor de balancín y al inclinarse se activa el buzzer y mediante una página web registra la inclinación y el voltaje.	Vilma Mercedes Barrios Reyes	posts/xrT5YxLgL3iVxQpEppmrkx7xJf4rtrM8oscxlwIa.jpg	publicado	2026-11-21 20:37:36	2026-11-21 20:37:36
17	1	4	Blog Académico	2026-11-19	Este blog se hizo con el objetivo de analizar y realizar diferentes ejercicios correspondientes a temas impartidos en la cátedra de Teoría de Sistemas con el fin de crear un espacio entretenido y práctico y fomentar en el estudiante el aprendizaje continuo y pensamiento crítico de manera que los conocimientos teóricos sean aplicables en la vida diaria y en el ámbito informático, permitiendo desarrollar un pensamiento sistémico en la elaboración de soluciones de software.	Dayna Rebeca Moreno Santiago	posts/ZANf4hdWPct5LYAqGdeWhhuVfhLNIzyPdUDygpLU.jpg	publicado	2026-11-21 20:40:11	2026-11-21 20:40:11
18	1	4	Risk Matemático	2026-11-19	Te presentamos el juego Risk Matemático, una forma divertida de jugar y aprender sobre ecuaciones diferenciales, es una versión del juego de mesa clásico Risk, ambientado en el territorio salvadoreño. Los dos jugadores por turnos deben conquistar la mayor cantidad de departamentos utilizando dos ecuaciones diferenciales Euler y RK4.	Dayna Rebeca Moreno Santiago	posts/g8qJrYa17it91DRx8e0MnK2IY3KGKBg3vwIoGGmV.jpg	publicado	2026-11-21 20:41:51	2026-11-21 20:41:51
19	1	4	Campus Connect FMO	2026-11-19	Este proyecto consiste en registrar edificios de la Universidad de El Salvador de la Facultad Multidisciplinaria Oriental, básicamente captura la presencia de los usuarios y se muestra en una página web el localizador de dichos usuarios	Vilma Mercedes Barrios Reyes	posts/KSdtrkFsyHuQ59AzTXkM2lIgPqxv5KLdrsVv86qa.jpg	publicado	2026-11-21 20:43:56	2026-11-21 20:43:56
20	1	4	Basta	2026-11-19	Diviértete con este increíble juego de Basta realizado por los estudiantes de 4° año para la materia de Programación para Dispositivos Móviles, consiste con el típico juego de bachillerato stop contiene todas las categorías y puedes jugar entre amigos solo debes registrarte e ingresar a una sala y competir con tus amigos.	Vilma Maria Gutierrez Juarez	posts/kMHJ3mIAy1jEUXGgZaSPAVB7YuEWG3kPySKD3y58.jpg	publicado	2026-11-21 20:46:39	2026-11-21 20:46:39
21	1	4	Blink Care	2026-11-19	Es una aplicación móvil con tecnología de apoyo visual, reúne funciones accesibles y ayuda humana todo en una sola aplicación, permite reconocer objetos y obtener información por voz, escanear documentos impresos y escucharlos y avisar a contactos o llamar a voluntarios.	Vilma Mercedes Barrios Reyes	posts/qKPd4nBsDZkPFX5OCPJaJ1bVNdqJP95FPc4EYs9Y.jpg	publicado	2026-11-21 20:49:07	2026-11-21 20:49:07
22	1	4	SEBT-FMO	2026-11-19	Es una aplicación para la Universidad de El Salvador (UES) enfocada en dar seguimiento a estudiantes próximos a graduarse, egresados y graduados, facilitando su inserción laboral mediante una bolsa de trabajo.	Vilma Maria Gutierrez Juarez	posts/CruZhNkk0GiwoddxiSZ3xt7miifFvwiWQiJRdvtH.jpg	publicado	2026-11-21 20:52:39	2026-11-21 20:52:39
23	1	5	Comelona de Pizza	2026-11-19	Una de las actividades más divertidas y esperadas fue la comelona de pizza, donde los participantes tenían 15 minutos para terminarse una pizza completa y demostrar quién podía hacerlo en menos tiempo. El gran ganador fue el Ing. Guandique, quien logró terminar toda su pizza en tan solo 7 minutos. ¡Sin duda, una competencia llena de sabor, emoción y muchas risas!	Dayna Rebeca Moreno Santiago	posts/qVPsCE03o7kFHKcEi98ww67qNV1A1kHQ86mQ3bLO.jpg	publicado	2026-11-21 20:54:20	2026-11-21 20:54:20
24	1	6	TORNEO FUTSAL	2026-11-20	Para iniciar las actividades del último día, se llevó a cabo un emocionante torneo de fútbol sala, donde estudiantes de diferentes carreras participaron demostrando sus habilidades y espíritu deportivo. Después de varios encuentros, los grandes ganadores fueron los estudiantes de Ingeniería Industrial, quienes se llevaron la victoria. Fue una mañana llena de emoción, compañerismo y mucha energía.	Dayna Rebeca Moreno Santiago	posts/HR9rVz3ImLt35rbnVqP5bnZ5kXti49ebwXNIfPZo.jpg	publicado	2026-11-21 20:56:01	2026-11-21 20:56:01
25	1	7	Parrillada	2026-11-20	Para cerrar la Semana de Sistemas, disfrutamos de una barbacoa al mediodía, un momento especial para compartir, convivir y celebrar todo lo vivido durante la semana. En esta actividad colaboraron varios estudiantes, bajo la dirección del Ing. Diego Herrera, quien estuvo a cargo de preparar los alimentos. Fue una bonita manera de finalizar las actividades, compartiendo entre compañeros y llevando con nosotros buenos recuerdos de esta experiencia.	Vilma Mercedes Barrios Reyes	posts/tjpvE16dXe51nkY8R9421lDOFQWSavwBnwMfA9tL.jpg	borrador	2026-11-21 20:58:51	2026-11-21 20:58:51
26	1	8	Madrugadera	2026-11-20	Nos tocó madrugar para ayudar con la decoración del auditorio, con sueño pero felices xD	Vilma Barrios, Vilma Gutierrez, Dayna Moreno	posts/T45YKAH1ubLN152yjAGNU8lz2xabLZTR1EUOzJRf.jpg	publicado	2026-11-21 21:02:12	2026-11-21 21:02:12
27	1	8	Moments	2026-11-20	Para que no diga que faltamos adjuntamos evidencia (si pedimos permiso para las fotos)	Vilma Barrios, Vilma Gutierrez, Dayna Moreno	posts/kRKkVyLFkcgHzvrYCxhllKiXE4Wpg0INlInC5G65.jpg	publicado	2026-11-21 21:05:42	2026-11-21 21:06:47
28	1	8	Canopis	2026-11-20	Que se note que somos todo terreno, la de armar y desarmar canopis ya la sabemos	Vilma Barrios, Vilma Gutierrez, Dayna Moreno	posts/VJAbt0EuNTvzn2qQFEQxJUYDnumP2kzhyy2n0euL.jpg	publicado	2026-11-21 21:08:21	2026-11-21 21:08:21
29	1	8	Cocinada	2026-11-20	Y si sabemos cocinar, el arroz cantonés quedó deli, si duda pregúntele a los cipotes	Vilma Barrios, Vilma Gutierrez, Dayna Moreno	posts/sJ2eKa27cGHof5mCP2rDc9FtPxx4KL43uNXgXv80.jpg	publicado	2026-11-21 21:11:28	2026-11-21 21:11:28
30	1	8	Fotos con los Ingenieros	2026-11-20	Las fotos con los ingenieros no podían faltar (pero si nos faltaron algunos ingenieros para la foto xD)	Vilma Barrios, Vilma Gutierrez, Dayna Moreno	posts/SDTPi77UdJeW4YZjZREKKrpuPRHmigcvcOiI1LwI.jpg	publicado	2026-11-21 21:13:57	2026-11-21 21:13:57
\.


--
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at, role) FROM stdin;
2	Vilma Barrios	mercedesreyes08.11.19@gmail.com	\N	$2y$12$e9YMgCE.BxQ4KW3RN959I.7NTID5QlnHnwc0rmVjQs1vNkHiXekoC	\N	2026-11-19 23:33:57	2026-11-19 23:33:57	usuario
3	bibi	bibi@gmail.com	\N	$2y$12$AVgiN5W6eSgXKBCZ60UZo.WUCJi4J8kDr2QeJumfATY2mgtcNnRfC	\N	2026-11-21 16:46:47	2026-11-21 16:46:47	usuario
4	usuario	usuario@gmail.com	\N	$2y$12$mG.4u89LkuPVreaFbl61n.f.oLqN2zk7FTto6Fbo.cmkPStivO5C6	\N	2026-11-21 18:17:44	2026-11-21 18:17:44	usuario
1	Administrador	admin@blog.test	\N	$2y$12$mHiXq0Jnyk2m9GDG89zR..PM.iWZqXns.9azle7DFuA.UJf5z22/q	\N	2026-11-19 23:32:03	2026-11-21 18:33:00	admin
\.


--
-- Name: categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categories_id_seq', 10, true);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 7, true);


--
-- Name: post_images_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.post_images_id_seq', 1, false);


--
-- Name: posts_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.posts_id_seq', 32, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 4, true);


--
-- Name: cache_locks cache_locks_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cache_locks
    ADD CONSTRAINT cache_locks_pkey PRIMARY KEY (key);


--
-- Name: cache cache_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cache
    ADD CONSTRAINT cache_pkey PRIMARY KEY (key);


--
-- Name: categories categories_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: job_batches job_batches_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_batches
    ADD CONSTRAINT job_batches_pkey PRIMARY KEY (id);


--
-- Name: jobs jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- Name: post_images post_images_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.post_images
    ADD CONSTRAINT post_images_pkey PRIMARY KEY (id);


--
-- Name: posts posts_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.posts
    ADD CONSTRAINT posts_pkey PRIMARY KEY (id);


--
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);


--
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: cache_expiration_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX cache_expiration_index ON public.cache USING btree (expiration);


--
-- Name: cache_locks_expiration_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX cache_locks_expiration_index ON public.cache_locks USING btree (expiration);


--
-- Name: failed_jobs_connection_queue_failed_at_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX failed_jobs_connection_queue_failed_at_index ON public.failed_jobs USING btree (connection, queue, failed_at);


--
-- Name: jobs_queue_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX jobs_queue_index ON public.jobs USING btree (queue);


--
-- Name: sessions_last_activity_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);


--
-- Name: sessions_user_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);


--
-- Name: post_images post_images_post_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.post_images
    ADD CONSTRAINT post_images_post_id_foreign FOREIGN KEY (post_id) REFERENCES public.posts(id) ON DELETE CASCADE;


--
-- Name: posts posts_category_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.posts
    ADD CONSTRAINT posts_category_id_foreign FOREIGN KEY (category_id) REFERENCES public.categories(id) ON DELETE CASCADE;


--
-- Name: posts posts_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.posts
    ADD CONSTRAINT posts_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

\unrestrict 6XliExiN6h2aa1fXviSodrkmopRCrbcSKjuCQWLVF8FJ0brVbeeTxxSj6fGns7o

