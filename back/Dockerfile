FROM openjdk:11
LABEL maintainer="Ngor SECK ngorsecka@gmail.com"
EXPOSE 8080
ADD target/bank_credit.jar bank_credit.jar
ENTRYPOINT ["java", "-jar", "bank_credit.jar"]