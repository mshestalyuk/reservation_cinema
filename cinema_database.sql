--
-- PostgreSQL database dump
--

-- Dumped from database version 14.10 (Ubuntu 14.10-0ubuntu0.22.04.1)
-- Dumped by pg_dump version 14.10 (Ubuntu 14.10-0ubuntu0.22.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: admin; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.admin (
    admin_id integer NOT NULL,
    user_id integer NOT NULL
);


ALTER TABLE public.admin OWNER TO postgres;

--
-- Name: admin_admin_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.admin_admin_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.admin_admin_id_seq OWNER TO postgres;

--
-- Name: admin_admin_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.admin_admin_id_seq OWNED BY public.admin.admin_id;


--
-- Name: booking; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.booking (
    booking_id integer NOT NULL,
    customer_id integer NOT NULL,
    ticket_id integer NOT NULL,
    book_time time without time zone NOT NULL,
    "paymentMethod" character varying(255) NOT NULL
);


ALTER TABLE public.booking OWNER TO postgres;

--
-- Name: booking_booking_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.booking_booking_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.booking_booking_id_seq OWNER TO postgres;

--
-- Name: booking_booking_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.booking_booking_id_seq OWNED BY public.booking.booking_id;


--
-- Name: cinema; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cinema (
    cinema_id integer NOT NULL,
    name character varying,
    city character varying,
    location character varying,
    num_of_screens integer,
    post_code integer
);


ALTER TABLE public.cinema OWNER TO postgres;

--
-- Name: customer; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.customer (
    id integer NOT NULL,
    detail_id integer,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    role character varying(50) DEFAULT 'user'::character varying NOT NULL
);


ALTER TABLE public.customer OWNER TO postgres;

--
-- Name: customer_details; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.customer_details (
    id integer NOT NULL,
    name character varying NOT NULL,
    surname character varying NOT NULL
);


ALTER TABLE public.customer_details OWNER TO postgres;

--
-- Name: customer_details_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.customer_details ALTER COLUMN id ADD GENERATED BY DEFAULT AS IDENTITY (
    SEQUENCE NAME public.customer_details_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: customer_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.customer_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.customer_id_seq OWNER TO postgres;

--
-- Name: customer_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.customer_id_seq OWNED BY public.customer.id;


--
-- Name: movie; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.movie (
    movie_id integer NOT NULL,
    name character varying,
    genre character varying,
    release character varying,
    "cast" character varying,
    director character varying,
    certificate character varying,
    image character varying(255)
);


ALTER TABLE public.movie OWNER TO postgres;

--
-- Name: movie_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.movie_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.movie_id_seq OWNER TO postgres;

--
-- Name: movie_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.movie_id_seq OWNED BY public.movie.movie_id;


--
-- Name: movie_movie_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

ALTER TABLE public.movie ALTER COLUMN movie_id ADD GENERATED BY DEFAULT AS IDENTITY (
    SEQUENCE NAME public.movie_movie_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);


--
-- Name: screen; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.screen (
    screen_id integer NOT NULL,
    cinema_id integer,
    type character varying,
    capacity integer,
    screen_num integer,
    showtimes timestamp without time zone
);


ALTER TABLE public.screen OWNER TO postgres;

--
-- Name: seat; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.seat (
    seat_id integer NOT NULL,
    screen_id integer,
    seat_num integer,
    "row" integer,
    class text,
    available boolean
);


ALTER TABLE public.seat OWNER TO postgres;

--
-- Name: showtime; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.showtime (
    showtime_id integer NOT NULL,
    movie_id integer,
    screen_id integer,
    starttime timestamp without time zone,
    endtime timestamp without time zone,
    date date,
    seats integer
);


ALTER TABLE public.showtime OWNER TO postgres;

--
-- Name: ticket; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ticket (
    ticker_id integer NOT NULL,
    showtime_id integer NOT NULL,
    seat_id integer NOT NULL,
    customer_id integer NOT NULL,
    price integer NOT NULL
);


ALTER TABLE public.ticket OWNER TO postgres;

--
-- Name: ticket_ticker_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ticket_ticker_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ticket_ticker_id_seq OWNER TO postgres;

--
-- Name: ticket_ticker_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ticket_ticker_id_seq OWNED BY public.ticket.ticker_id;


--
-- Name: admin admin_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin ALTER COLUMN admin_id SET DEFAULT nextval('public.admin_admin_id_seq'::regclass);


--
-- Name: booking booking_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.booking ALTER COLUMN booking_id SET DEFAULT nextval('public.booking_booking_id_seq'::regclass);


--
-- Name: customer id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.customer ALTER COLUMN id SET DEFAULT nextval('public.customer_id_seq'::regclass);


--
-- Name: ticket ticker_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ticket ALTER COLUMN ticker_id SET DEFAULT nextval('public.ticket_ticker_id_seq'::regclass);


--
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.admin (admin_id, user_id) FROM stdin;
\.


--
-- Data for Name: booking; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.booking (booking_id, customer_id, ticket_id, book_time, "paymentMethod") FROM stdin;
\.


--
-- Data for Name: cinema; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cinema (cinema_id, name, city, location, num_of_screens, post_code) FROM stdin;
\.


--
-- Data for Name: customer; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.customer (id, detail_id, email, password, role) FROM stdin;
1	9	example1@gmail.com	14124	user
3	10	example3@gmail.com	144214	user
4	11	example5@gmail.com	144214	user
5	12	example6@gmail.com	144214	user
6	13	example7@gmail.com	144214	user
7	14	example8@gmail.com	144214	user
9	20	admin@gmail.com	21232f297a57a5a743894a0e4a801fc3	admin
\.


--
-- Data for Name: customer_details; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.customer_details (id, name, surname) FROM stdin;
9	John	Big
10	John	Big
11	John	Big
12	Maksymilian	Shestalyuk
13	Maksymilian	Shestalyuk
14	Maksymilian	Shestalyuk
15	ADADA	ADADA
16	adada	dadada
17	Maka	Shea
18	ada	strong
19	Max	Strong
20	Admin	Admin
\.


--
-- Data for Name: movie; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.movie (movie_id, name, genre, release, "cast", director, certificate, image) FROM stdin;
1	Avangers	Horror	2024-01-01	Brad Pit	Jong Due	16+	avangers.jpeg
2	Batman	Norror	2022-01-01	Jason Stetchem	Rock Jonson	12+	batman.png
3	Uncharted	Borror	2021-01-01	Jason Stetchem	Rock Jonson	14+	uncharted.jpg
\.


--
-- Data for Name: screen; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.screen (screen_id, cinema_id, type, capacity, screen_num, showtimes) FROM stdin;
\.


--
-- Data for Name: seat; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.seat (seat_id, screen_id, seat_num, "row", class, available) FROM stdin;
\.


--
-- Data for Name: showtime; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.showtime (showtime_id, movie_id, screen_id, starttime, endtime, date, seats) FROM stdin;
\.


--
-- Data for Name: ticket; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ticket (ticker_id, showtime_id, seat_id, customer_id, price) FROM stdin;
\.


--
-- Name: admin_admin_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.admin_admin_id_seq', 1, false);


--
-- Name: booking_booking_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.booking_booking_id_seq', 1, false);


--
-- Name: customer_details_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.customer_details_id_seq', 20, true);


--
-- Name: customer_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.customer_id_seq', 9, true);


--
-- Name: movie_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.movie_id_seq', 1, false);


--
-- Name: movie_movie_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.movie_movie_id_seq', 5, true);


--
-- Name: ticket_ticker_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.ticket_ticker_id_seq', 1, false);


--
-- Name: admin Admin_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT "Admin_pk" PRIMARY KEY (admin_id, user_id);


--
-- Name: booking Booking_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.booking
    ADD CONSTRAINT "Booking_pk" PRIMARY KEY (booking_id);


--
-- Name: ticket Ticket_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ticket
    ADD CONSTRAINT "Ticket_pk" PRIMARY KEY (ticker_id);


--
-- Name: cinema cinema_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cinema
    ADD CONSTRAINT cinema_pkey PRIMARY KEY (cinema_id);


--
-- Name: customer_details customer_details_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.customer_details
    ADD CONSTRAINT customer_details_pk PRIMARY KEY (id);


--
-- Name: customer customer_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.customer
    ADD CONSTRAINT customer_email_key UNIQUE (email);


--
-- Name: customer customer_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.customer
    ADD CONSTRAINT customer_pkey PRIMARY KEY (id);


--
-- Name: movie movie_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.movie
    ADD CONSTRAINT movie_pkey PRIMARY KEY (movie_id);


--
-- Name: screen screen_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.screen
    ADD CONSTRAINT screen_pkey PRIMARY KEY (screen_id);


--
-- Name: seat seat_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.seat
    ADD CONSTRAINT seat_pkey PRIMARY KEY (seat_id);


--
-- Name: showtime showtime_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.showtime
    ADD CONSTRAINT showtime_pkey PRIMARY KEY (showtime_id);


--
-- Name: customer customer_detail_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.customer
    ADD CONSTRAINT customer_detail_id_fkey FOREIGN KEY (detail_id) REFERENCES public.customer_details(id);


--
-- Name: screen screen_cinema_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.screen
    ADD CONSTRAINT screen_cinema_id_fkey FOREIGN KEY (cinema_id) REFERENCES public.cinema(cinema_id);


--
-- Name: seat seat_screen_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.seat
    ADD CONSTRAINT seat_screen_id_fkey FOREIGN KEY (screen_id) REFERENCES public.screen(screen_id);


--
-- Name: showtime showtime_movie_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.showtime
    ADD CONSTRAINT showtime_movie_id_fkey FOREIGN KEY (movie_id) REFERENCES public.movie(movie_id);


--
-- Name: showtime showtime_screen_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.showtime
    ADD CONSTRAINT showtime_screen_id_fkey FOREIGN KEY (screen_id) REFERENCES public.screen(screen_id);


--
-- PostgreSQL database dump complete
--
