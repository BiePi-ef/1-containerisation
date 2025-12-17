# Optimisations : update linux (only requiered dependencies)
# For safty : add a user when launching the image to have it safe.

# Stage 1: Build
FROM gradle:8.5-jdk21 AS build
COPY . /app
WORKDIR /app
RUN ./gradlew build --no-daemon --warning-mode=all

FROM amazoncorretto:21
#  --from=build waits for 'build' to be done executing
COPY --from=build /app/build/libs/RentalService-0.0.1-SNAPSHOT.jar .
CMD java -Xmx300m -Xms300m -XX:TieredStopAtLevel=1 -noverify -jar RentalService-0.0.1-SNAPSHOT.jar
EXPOSE 8080
