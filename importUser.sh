#!/bin/bash 

param=$1

yiic shell << EOF 
userimport $param
EOF 

