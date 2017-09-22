#!/bin/bash

/opt/solr/bin/post -c user -d '<delete><query>*:*</query></delete>'

/opt/solr/bin/post -c user /opt/solr/mydata/users.xml

cp -R /opt/solr/solr-data /opt/solr/mydata/data


