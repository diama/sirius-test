#!/usr/bin/env bash
echo Run $1
mysql -h localhost -u test -b sirius -ptest < /code/task3/$1
echo