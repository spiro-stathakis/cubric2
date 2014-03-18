#!/bin/bash 

param=$1

yiic shell << EOF 
storageimport $param
EOF 

