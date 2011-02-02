#!/bin/bash -e

git config --global user.name "Luis Alejandro Martínez Faneyth"
git config --global user.email "martinez.faneyth@gmail.com"
export DEBFULLNAME="Luis Alejandro Martínez Faneyth"
export DEBEMAIL="martinez.faneyth@gmail.com"

FECHA=$( date +%s )

VERSIONAMIENTO_DIR="/home/operador-wiki/versionamiento-wiki"
RESPALDO_DIR="/home/operador-wiki/respaldo-wiki"

SCRIPTS="/home/operador-wiki/scripts-mantenedor"
VAR_LIB="/var/lib/mediawiki"
USR_SHARE="/usr/share/mediawiki"
ETC="/etc/mediawiki"

rm -rf ${VERSIONAMIENTO_DIR}/var ${VERSIONAMIENTO_DIR}/usr ${VERSIONAMIENTO_DIR}/etc ${VERSIONAMIENTO_DIR}/home

mkdir -p ${RESPALDO_DIR}

for COPIA in ${VAR_LIB} ${USR_SHARE} ${ETC} ${SCRIPTS}
do

mkdir -p ${VERSIONAMIENTO_DIR}${COPIA}
cp -a ${COPIA}/* ${VERSIONAMIENTO_DIR}${COPIA}/

done

cd ${VERSIONAMIENTO_DIR}

[ ! -e ${VERSIONAMIENTO_DIR}/.git ] && git init && git remote add origin git@gitorious.org:plataforma-canaima/wiki-principal.git

if [ $( git status | grep -c "nothing to commit (working directory clean)" ) == 0 ]
then

tar -jcf ${RESPALDO_DIR}/respaldo-wiki-${FECHA}.tar.bz2 ${VERSIONAMIENTO_DIR}/var ${VERSIONAMIENTO_DIR}/usr ${VERSIONAMIENTO_DIR}/etc ${VERSIONAMIENTO_DIR}/home

rm -rf ${VERSIONAMIENTO_DIR}${ETC}/AdminSettings.php ${VERSIONAMIENTO_DIR}${ETC}/LocalSettings.php

git add .
git commit -a -m "Versionamiento ${FECHA}"
git push origin master

fi
