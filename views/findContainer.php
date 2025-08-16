<section class="findContainer" id="findContainer">
<div class="containerResult">
       <!-- <div class="donorFind">
        
      </div> -->
</div>
</section>
      <style>

#findContainer{
        width:100%;
        padding:1rem;
      
    }
    #findContainer .containerResult{
    display: flex;
        flex-direction: row;
        flex-wrap:wrap;
        gap:10px;
    }

#findContainer  .containerResult .donorFind{

        width:300px;
        display: flex;
        flex-direction: row;
        flex-wrap:wrap;
        gap:10px;
        background-color: var(--blanch);
        padding:20px;
        box-shadow: 0 .5rem 1rem #00000026 !important;
        border-radius: 18px;
        /* visibility:hidden; */

          
        }
    .donorFind .img-find{
        width:50%;
        height:100px;
        background-image: url(../src/images/donorFind.jpg);
        background-repeat: no-repeat;
        background-size:contain;
        background-position: center;
        border-radius: 50%;
        margin:0 auto;
        margin-bottom: 10px;
        box-shadow: 0 .5rem 1rem #00000026 !important;
    }
        </style>