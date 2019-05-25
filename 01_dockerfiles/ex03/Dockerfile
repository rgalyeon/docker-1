# Exercise:  Docker can be useful to test an application that’s still being developed
#            without polluting your libraries. You will have to design a Dockerfile that gets the development
#            version of Gitlab - Community Edition installs it with all the dependencies and the necessary configurations,
#            and launches the application, all as it builds. The container will be
#            deemed valid if you can access the web client, create users and interact via GIT with this
#            container (HTTPS and SSH). Obviously, you are not allowed to use the official container
#            from Gitlab, it would be a shame...
#
# How to run:  1) docker build -t ex03 .
#              2) docker run -it --rm -P --privileged ex03

FROM ubuntu:latest

MAINTAINER Dmirty Filin <dmifilin@gmail.com>

RUN apt-get update -y && apt-get upgrade -y && \
	apt-get install -y curl openssh-server ca-certificates && \
	apt-get install -y postfix && apt-get install -y tzdata

WORKDIR /tmp

RUN curl -LO https://packages.gitlab.com/install/repositories/gitlab/gitlab-ce/script.deb.sh && chmod 777 script.deb.sh && ./script.deb.sh

RUN apt-get install -y gitlab-ce

EXPOSE 80 443 22 22222

RUN mkdir -p /etc/ssl/private && \
		mkdir -p /etc/ssl/certs && \
		mkdir -p /etc/gitlab/ssl

RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
		-subj "/C=UK/ST=GGgg/L=GGgg/O=GGgg/OU=GGgg/CN=192.168.99.100" \
		-keyout /etc/gitlab/ssl/key.key \
		-out /etc/gitlab/ssl/cert.crt

RUN echo "nginx['ssl_certificate'] = \"/etc/gitlab/ssl/cert.crt\""  >> /etc/gitlab/gitlab.rb && \
	echo "nginx['ssl_certificate_key'] = \"/etc/gitlab/ssl/key.key\"" >> /etc/gitlab/gitlab.rb && \
	echo "nginx['redirect_http_to_https'] = true" >> /etc/gitlab/gitlab.rb && \
	echo "nginx['redirect_http_to_https_port'] = 80" >> /etc/gitlab/gitlab.rb && \
	echo "letsencrypt['enable'] = false" >> /etc/gitlab/gitlab.rb && \
	echo "gitlab_rails['gitlab_ssh_host'] = '192.168.99.100'" >> /etc/gitlab/gitlab.rb && \
	echo "gitlab_rails['gitlab_shell_ssh_port'] = 22222" >> /etc/gitlab/gitlab.rb

RUN (/opt/gitlab/embedded/bin/runsvdir-start &) && gitlab-ctl reconfigure
RUN usermod -a -G $(cat /etc/group | awk -F ':' '{print $1}' | tr '\n' ',' | sed 's/,$//g') git
RUN usermod -a -G $(cat /etc/group | awk -F ':' '{print $1}' | tr '\n' ',' | sed 's/,$//g') gitlab-www

RUN echo "Port 22222" >> /etc/ssh/ssh_config
RUN echo "Port 22222" >> /etc/ssh/sshd_config
RUN mkdir -p /run/sshd

ENTRYPOINT cat /etc/gitlab/gitlab.rb | awk -v ip=$IP -v q="'" '{if ($1 == "external_url") {$2 = q"https://"ip"/"q} print $0}' > tmp.gg && \
				cat tmp.gg > /etc/gitlab/gitlab.rb && \
				/usr/sbin/sshd && \
				rm -f tmp.gg && \					
				(/opt/gitlab/embedded/bin/runsvdir-start &) && \
				gitlab-ctl reconfigure && \
				tail -f /dev/null
