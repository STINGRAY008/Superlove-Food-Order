<?php include('partials-front/menu.php'); ?>
<!-- ------------------------------------------ CONTACT US  ----------------------------------------- -->
<div class="container">
    <div class="wrapper">
        <section class="location">
            <section class="contact-us">
                <div class="row">
                    <div class="contact-col1">
                        <div>
                            <i class="fa fa-home"></i>
                            <span>
                                <h5>Nursery Road, Purok 5, Lagao, GSC</h5>
                                <p>General Santos City</p>
                            </span>
                            <i class="fa fa-phone"></i>
                            <span>
                                <h5>09551232318</h5>
                                <p>Monday-Saturday 8:00AM to 9:00PM</p>
                            </span>
                            <i class="fa fa-envelope-o"></i>
                            <span>
                                <h5>superlove-bistro@gmail.com</h5>
                                <p>Email us your query</p>
                            </span>
                        </div>
                    </div>
                    <div class="contact-col2">
                        <form action="">
                            <input type="text" placeholder="Enter your name" required>
                            <input type="email" placeholder="Enter your email" required>
                            <input type="text" placeholder="Enter your subject" required>
                            <textarea rows="8" placeholder="Message"required></textarea>
                            <button type="submit" class="hero-btn">Send Message</button>
                        </form>
                    </div>

                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31735.929146330003!2d125.19801715000003!3d6.131891393969288!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32f79e30b55e7f0d%3A0xf347249672a6cb82!2sLagao%2C%20General%20Santos%20City%2C%20South%20Cotabato!5e0!3m2!1sen!2sph!4v1663217329363!5m2!1sen!2sph" width="300px" height="250px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </section>   
        </section>
    </div>
</div>
<style>
    /* ************************************************* CONTACT US PAGE ************************************************* */
.location{
    width: 100%;
    margin: auto;
    padding: 20px 0;
    background-color: #f8f5f3;
}
.location iframe{
    width: 100%;
}
.contact-us{
    width: 80%;
    margin: auto;
}
.contact-col1, .contact-col2{
    flex-basis: 40%;
    margin-bottom: 30px;
}  
.contact-col1 div{
    align-items: center;
    margin-bottom: 40px;
}
.contact-col1 div .fa{
    font-size: 28px;
    color: #f44336;
    margin: 10px;
    margin-right: 30px;
}
.contact-col1 div h5{
    font-size: 20px;
    margin-bottom: 5px;
    color: #555;
    font-weight: 400;
}
.contact-col2 div{
    align-items: center;
    margin-bottom: 40px;
}
.contact-col2 input, .contact-col2 textarea{
    width: 100%;
    padding: 15px;
    margin-bottom: 17px;
    outline: none;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
.contact-col2 .hero-btn{
    border: none;
}
.hero-btn{
    display: inline-block;
    text-decoration: none;
    color: white;
    /* border: 3px solid white; */
    padding: 12px 34px;
    font-size: 18px;
    background: transparent;
    position: relative;
    cursor: pointer;
    background-color: #0096FF;
}
.hero-btn:hover{
    /* border: 2px solid #f44336; */
    background: #f3867e;
    transition: 1s;
}
.row{
    margin-top: 5%;
    display: flex;
    justify-content: space-between;
}
h1{
    font-size: 34px;
    font-weight: 600;
}
p{
    color: #777;
    font-size: 18px;
    font-weight: 600;
    line-height: 22px;
    padding: 10px;
}

@media (max-width: 700px){
    .row{
        flex-direction: column;
        overflow: hidden;
    }
   
}
</style>

<?php include('partials-front/footer.php'); ?>