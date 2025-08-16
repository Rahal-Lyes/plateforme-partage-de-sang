<section class="find" id="find">
  <div class="containerFind">
    <div>
      <h3>Finding blood donors near you</h3>
    </div>
    <form method="POST" id="form-input">
      <div class="group-input">
        <div class="field-box">
          <span class="field-title">Blood Group<span style="color:red;"> *</span></span>
          <select class="input-field" id="bloodTypeInput" name="blood_group_select" required>
            <option value="" disabled selected>Select Blood Group</option>
          </select>
          <small class="error-msg">Error</small>
        </div>

        <div class="location field-box">
          <span class="field-title">Wilaya<span style="color:red;"> *</span></span>
          <select name="wilaya_select" class="select-field" id="wilaya_select">
            <option disabled selected>Please select your location</option>
          </select>
          <small class="error-msg">Error</small>
        </div>

        <div class="field-box location">
          <span class="field-title">Daira<span style="color:red;"> *</span></span>
          <select name="daira_select" class="select-field" id="daira_select">
            <option value="" disabled selected>Select daira</option>
          </select>
          <small class="error-msg">Error</small>
        </div>

        <button id="find-btn" type="submit"><i class="fa fa-search"></i> Find</button>
      </div>
    </form>
  </div>
</section>

<style>
  #find {
    width: 90%;
    height: auto;
    min-width: 320px;
    border-radius: 20px;
    background: var(--blanch);
    box-shadow: 0 0.5rem 1rem #00000026 !important;
    margin: 10px auto;
    padding: 20px;
  }

  .containerFind {
    width: 100%;
    height: auto;
    margin: 0 auto;
    text-align: center;
  }

  .containerFind h3 {
    padding: 1rem 0;
    color: var(--bleu1);
    font-size: 2.5vw;
    min-width: 320px;
    margin-bottom: 25px;
  }

  .group-input {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    min-width: 320px;
  }

  .group-input .field-box {
    width: 100%;
    margin-bottom: 18px;
    color: var(--bleu2);
  }

  .group-input .field-title {
    font-weight: 500;
    margin: 8px 0;
    display: block;
    color: var(--bleu2);
  }

  .group-input .input-field,
  .group-input .select-field {
    width: 100%;
    height: 45px;
    outline: none;
    border-radius: 5px;
    border: 1px solid #9b59b6;
    padding-left: 15px;
    font-size: 17px;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
    color: var(--bleu2);
    background-color: var(--blanch);
  }

  .group-input .field-box small {
    visibility: hidden;
  }

  .group-input .field-box.error input,
  .group-input .field-box.error select {
    border: 2px solid #e74c3c;
  }

  .group-input .field-box.error small {
    color: #e74c3c;
    visibility: visible;
  }

  #find-btn {
    height: 40px;
    width: 100%;
    max-width: 300px;
    outline: none;
    color: #fff;
    border: none;
    font-size: 18px;
    font-weight: 500;
    border-radius: 10px;
    letter-spacing: 3px;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
    margin-top: 30px;
  }

  #find-btn:hover {
    background: linear-gradient(-135deg, #71b7e6, #9b59b6);
    cursor: pointer;
  }

  @media (min-width: 600px) {
    .containerFind h3 {
      font-size: 2rem;
      text-align: left;
      margin-left: 0;
    }

    .group-input {
      flex-direction: row;
      justify-content: space-between;
    }

    .group-input .field-box {
      width: calc(100% / 3 - 10px);
    }

    #find-btn {
      width: 60%;
      margin: 30px auto 0;
    }
  }
</style>
