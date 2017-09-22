FROM solr:6.6.0
MAINTAINER Jose Guillermo <jguillermo@outlook.com>

RUN wget -qO- http://cdn.mysql.com//Downloads/Connector-J/mysql-connector-java-3.0.17-ga.tar.gz | tar xvz -C /tmp/ && \
    mv /tmp/mysql-connector-java-3.0.17-ga/mysql-connector-java-3.0.17-ga-bin.jar /opt/solr/server/lib/

RUN mkdir /opt/solr/solr-data && chmod 777 /opt/solr/solr-data
# export
COPY ./export.sh /opt/solr/export.sh
COPY ./data /opt/solr/solr-data