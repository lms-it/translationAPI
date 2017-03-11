FROM nginx:latest

COPY nginxconfig/default.conf /etc/nginx/conf.d/default.conf
COPY nginxconfig/php.conf /etc/nginx/global/php.conf

CMD ["nginx", "-g", "daemon off;"]