-- Commands to Create Database

CREATE DATABASE library_catalog;
USE library_catalog;

CREATE TABLE authors (
    id serial PRIMARY KEY,
    name VARCHAR(70)
);

CREATE TABLE books (
    id serial PRIMARY KEY,
    title VARCHAR (100),
    genre VARCHAR (50)
);

CREATE TABLE works (
    id serial PRIMARY KEY,
    author_id int,
    book_id int
);

CREATE TABLE patrons (
    id serial PRIMARY KEY,
    name VARCHAR (70)
);

CREATE TABLE copies (
    id serial PRIMARY KEY,
    book_id int,
    available BOOLEAN
);

CREATE TABLE checkouts (
    id serial PRIMARY KEY,
    patron_id int,
    copy_id int,
    due_date date,
    status VARCHAR (50)
);
