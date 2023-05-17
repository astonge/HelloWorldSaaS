use actix_web::{get, web, App, HttpResponse, HttpServer, Responder};

#[get("/hello")]
async fn hello() -> impl Responder {
    HttpResponse::Ok().body("Hello")
}
#[get("/world")]
async fn world() -> impl Responder {
    HttpResponse::Ok().body("World")
}

#[get("/healthcheck")]
async fn healthcheck() -> impl Responder {
    HttpResponse::Ok().body("I'm alive!")
}

async fn invalid_route() -> impl Responder {
    HttpResponse::Ok().body("These are not the droids you are looking for...")
}

#[actix_web::main]
async fn main() -> std::io::Result<()> {
    HttpServer::new(|| {
        App::new()
            .service(hello)
            .service(world)
            .service(healthcheck)
            .route("/", web::get().to(invalid_route))
    })
    .bind(("127.0.0.1", 8080))?
    .run()
    .await
}
