FROM alpine:3.14

# 必要パッケージの取得とタイムゾーンの変更処理（Asia/Tokyo）
ENV TZ=Asia/Tokyo
RUN apk update
RUN apk --no-cache add tzdata

# dockerのバイナリを取得し、クライアントのみを/usr/local/binへコピー
RUN apk add --no-cache ssl_client && \
  mkdir -p /usr/local/bin && \
  wget https://get.docker.com/builds/Linux/x86_64/docker-latest.tgz -O - | tar -xzC /usr/local/bin --strip=1 docker/docker

# あらかじめ用意しておいたcrontabs用ファイルをコンテナへコピーする
RUN mkdir -p /var/spool/cron/crontabs
COPY --chown=root:root root /var/spool/cron/crontabs/root

CMD crond -l 2 -f