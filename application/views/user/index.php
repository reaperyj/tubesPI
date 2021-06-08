<section class="hero" id="about">
        <div class="hero-introduction flex">
          <h2>
           Welcome, <br />
           <strong><?=$this->session->userdata('name')?></strong>
          </h2>
          <p>Di Aplikasi Gudang Universitas Sumatera Utara <br></p>
    <small>Last Login : <?=$this->session->userdata('last_login')?></small>
         
        </div>
        <div class="hero-images">
          <img
            class="hero-image"
            src="./style/home3.png"
            alt="picture of logistic"
          />
        </div>
</section>

      