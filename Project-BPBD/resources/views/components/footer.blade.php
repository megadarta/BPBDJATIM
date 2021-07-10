<style>
          
            .footer-login-atas{
                background-color: black;
                height: 230px;
                padding: 50px 100px;
            }
            .footer-login-bawah{
                background-color: #454140;
                padding: 20px 100px;
                color: white;
                text-align: left;
            }
            .p-copyright{
                margin-top: auto!important;
                margin-bottom: auto!important;
                font-family: IBM Plex Sans;
                font-size: 12px;
            }
            .alamat-footer{
                color: white;
                font-style: normal;
                font-weight: normal;
                text-align: left;
                font-family: IBM Plex Sans;
                font-size: 12px;
                
            }
            .img-footer{
                width: 30px;
            }
            .medsos-footer{
                color: white;
                font-family: IBM Plex Sans;
                font-style: normal;
                font-weight: normal;
            }
</style>

<div className="footer-login">
            <div className="d-flex justify-content-between footer-login-atas">
                <div className="d-flex flex-column align-items-start align-self-center">
                    <div className="alamat-footer">
                      Kantor BPBD Prov. Jatim <br></br>
                      Jl. S. Parman No. 55, Waru, Sidoarjo <br></br>
                      Telp.031-8550101
                    </div>
                    <div className="alamat-footer mt-4">
                      Pusdalops PB Jawa Timur <br></br>
                      Telp. / WA / Telegram +62 812 317 80000
                    </div>
                </div>
                <div className="medsos-footer d-flex flex-column align-items-start align-self-center">
                    <div>Media sosial</div>
                    <div className="d-flex mt-3">
                      <a href="https://twitter.com/bpbd_jatim" target="_blank"><img src={twitter}  className="img-footer mr-3"></img></a>
                      <a href="https://web.facebook.com/bpbdjatim?_rdc=1&_rdr" target="_blank"><img src={fb} className="img-footer mr-3"></img></a>
                      <a href="https://www.instagram.com/bpbd_jatim/" target="_blank"><img src={ig} className="img-footer"></img></a>
                    </div>
                </div>
            </div>
            <div className="footer-login-bawah">
                <p className="p-copyright">© 2021 Copyleft BPBD Provinsi Jawa Timur.</p>
            </div>
        </div>
