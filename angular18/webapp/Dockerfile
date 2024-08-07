FROM node AS builder

WORKDIR /webappweb

COPY package*.json ./

RUN node -v

RUN npm -v

RUN npm cache clean --force

RUN npm install -f

COPY . ./

RUN npm run build

FROM nginx:latest

COPY nginx.conf /etc/nginx/nginx.conf

COPY --from=builder /webappweb/dist/webapp/browser/* /usr/share/nginx/html

#exposing internal port
EXPOSE 80
