path='../conf'
filelist=`/bin/ls ${path}`
echo -e "$1 wikis update\n"
for file in $filelist
do
  l=${#file}
  if [ ${file:$l-9:$l} == ".conf.php" ] ; then
    wikiname=${file:0:$l-9}
#    php test.php $wikiname
     echo -e $wikiname"wiki update start\n"
     php update.php $wikiname $1
     echo -e "end\n"
  fi
done
