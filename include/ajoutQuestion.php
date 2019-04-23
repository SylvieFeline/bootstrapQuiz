
<form action="../request/trt_questions.php" method="post">

    <div class="form-group">
        <label for="question">Libellé de la question : </label>
        <input type="text" name="question" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="nombreChoix">Sélectionner le nombre de propositions : </label>
        <select class="form-group" name="nbreChoix" id="nbreChoix" required >
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
    </div>
    <div id="afficheChoix"></div>

    