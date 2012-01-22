<form style="width:600px">

  <div class="mercury-display-pane-container">
    <div class="mercury-display-pane">
      <fieldset class="inputs">
        <ol>
          <li class="string input optional stringish" id="options_first_name_input">
            <label class="label" for="options_first_name">First Name</label>
            <input id="options_first_name" name="options[first_name]" type="text" value="Frank Bardon"/>
          </li>
        </ol>
      </fieldset>

      <fieldset class="inputs">
        <legend><span>Options</span></legend>
        <ol>
          <li class="string input optional stringish" id="options_favorite_beer_input">
            <label class="label" for="options_favorite_beer">Favorite Beer</label>
            <input id="options_favorite_beer" name="options[favorite_beer]" type="text" value="Miller Lite"/>
          </li>
        </ol>
      </fieldset>
    </div>
  </div>

  <div class="mercury-display-controls">
    <fieldset class="buttons">
      <ol>
        <li class="commit button"><input class="submit" name="commit" type="submit" value="Insert Snippet"/></li>
      </ol>
    </fieldset>
  </div>

</form>