<?php

# REPO OPTIONS
const SQL_TRUE = "1";
const SQL_FALSE = "0";
const SQL_LIKE_START = "SQL_LIKE_START";
const SQL_LIKE_END = "SQL_LIKE_END";
const SQL_LIKE_START_END = "SQL_LIKE_START_END";
const SQL_LIKE_NONE = "SQL_LIKE_NONE";

const NONE_IF_EMPTY = "NONE_IF_EMPTY";
const NULL_IF_EMPTY = "NONE_IF_EMPTY";
const BLANK_IF_EMPTY = "BLANK_IF_EMPTY";

function like($value, $wilcard=SQL_LIKE_START_END): string {
    switch ($wilcard) {
        default:
        case SQL_LIKE_START_END: return "like %$value%";
        case SQL_LIKE_NONE: return "like $value";
        case SQL_LIKE_START: return "like %$value";
        case SQL_LIKE_END: return "like $value%";
    }
}