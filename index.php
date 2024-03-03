<?php
    $numeErr = $mailErr = $telErr = $nume = $mail = $tel = $mesaj = "";
    $sent = false;

    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST))
    {
        $nume = $_POST["nume"];
        $mail = $_POST["mail"];
        $tel = $_POST["tel"];
        $mesaj = $_POST["mesaj"];

        if (empty($nume))
        {
            $numeErr = "Câmpul este obligatoriu";
        }
        else 
        {
            $nume = test_input($nume);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $nume)) 
            {
                $numeErr = "Sunt permise doar litere și spații";
            }
        }

        if (empty($mail))
        {
            $mailErr = "Câmpul este obligatoriu";
        }
        else
        {
            $mail = test_input($mail);
            if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) 
            {
                $mailErr = "E-mail invalid";
            }
        }

        if (empty($tel))
        {
            $telErr = "Câmpul este obligatoriu";
        }
        else
        {
            $tel = test_input($tel);
            if (!filter_var($tel, FILTER_SANITIZE_NUMBER_INT))
            {
                $telErr = "Număr de telefon invalid";
            }
        }

        if (empty($numeErr) && empty($mailErr) && empty($telErr))
        {
            //Mail
            $nume = $mail = $tel = $mesaj = "";
            $sent = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NavTele Eco</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="navigation.js" defer></script>
</head>
<body>
    <header class="header content">
        <video autoplay muted loop poster preload="auto" class="anim">
            <source src="poze/Animatie.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </header>
    <main style="overflow: hidden;">
        <section class="row1 content">
            <div class="column" data-aos-delay="300" data-aos="zoom-in-right" data-aos-duration="1200">
                <h1>Proiectare și instalare sisteme de panouri fotovoltaice</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque quaerat est similique atque doloribus reprehenderit ea pariatur sapiente, aliquid quasi maxime quos ullam voluptatem rerum iste, dignissimos corrupti animi iusto.</p>
            </div>
            <div class="column">
                <div class="img-bg to-animate" data-aos="fade-down-left" data-aos-duration="1200">
                    <img src="poze/vivint-solar-9CalgkSRZb8-unsplash.jpg" alt="Panouri solare">
                </div>
            </div>
        </section>
        <section class="row2 content">
            <div class="column">
                <img src="poze/tom-radetzki-czUK3rgnVio-unsplash.jpg" alt="Masina electrica la incarcat" data-aos="fade-right" data-aos-duration="1200">
            </div>
            <div class="column" data-aos="zoom-in-left" data-aos-duration="1200" data-aos-delay="300">
                <h1>Instalare stații de incărcare mașini electrice</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, reprehenderit iusto error, aspernatur facilis optio illo rerum rem tempore inventore non velit perspiciatis dolores sequi repellat ipsam? Cumque, accusamus quas.</p>
                <img src="poze/ernest-ojeh-aEytUoE1Tkc-unsplash.jpg" alt="Incarcator masina electrica" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="400">
            </div>
        </section>
        <section class="row3 content" id="contact">
            <h2>Contact</h2>
            <div class="row4">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."#contact";?>" method="POST" class="form" data-aos-duration="1200" data-aos="zoom-in-up" data-aos-delay="300">
                    <label for="nume">Nume: *</label>
                    <input type="text" name="nume" id="nume" value="<?php echo $nume; ?>">
                    <p><?php echo $numeErr; ?></p>
                    <label for="mail">E-mail: *</label>
                    <input type="email" name="mail" id="mail" value="<?php echo $mail; ?>">
                    <p><?php echo $mailErr; ?></p>
                    <label for="tel">Telefon: *</label>
                    <input type="tel" name="tel" id="tel" value="<?php echo $tel; ?>">
                    <p><?php echo $telErr; ?></p>
                    <label for="mesaj">Mesaj:</label>
                    <textarea name="mesaj" id="mesaj" ><?php echo $mesaj; ?></textarea>
                    <button type="submit">Trimite</button>
                </form>
                <div class="contact-column">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2760.578878217306!2d24.791405438144096!3d46.21883179417337!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x474b75c85f89032f%3A0x2356e7e391038d1d!2sThe%20Clock%20Tower!5e0!3m2!1sen!2sro!4v1709502293605!5m2!1sen!2sro" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer content">
        © Copyright
    </footer>
    <?php 
        if ($sent)
        {
    ?>
        <div class="sent">
            <img src="poze/mail-check-line.png" alt="Succes">
        </div>
    <?php
        }
    ?>
    <noscript>Ne pare rău, browserul dvs. nu acceptă JavaScript!</noscript>
    <script>
        AOS.init();

        if (window.history.replaceState)
        {
            window.history.replaceState(null, null, window.location.href);
        }

    <?php
        if ($sent)
        {
    ?>
        setTimeout(function() {
            document.querySelector(".sent").style.display = "none";
            history.pushState("", document.title, window.location.pathname + window.location.search);
        }, 5000);
    <?php
            $sent = false;
        }
    ?>

    const tx = document.getElementsByTagName("textarea");
        for (let i = 0; i < tx.length; i++) {
        tx[i].setAttribute("style", "height:" + (tx[i].scrollHeight) + "px;overflow-y:hidden;");
        tx[i].addEventListener("input", OnInput, false);
    }

    function OnInput() {
        this.style.height = "auto";
        this.style.height = (this.scrollHeight) + "px";
    }
    </script>
</body>
</html>