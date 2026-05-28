<main>
    <h1>Formulário</h1>
    <form action="?abobora=tab" method="post">
    <label for="nome">Nome: </label>
    <input type="text" name="nome" id="nome" placeholder="Digite o seu nome" aria-label="nome" ><br>

    <label for="email">E-mail: </label>
    <input type="email" name="email" id="email"><br>

    <label for="senha">Senha: </label>
    <input type="password" name="senha" id="senha"><br>

    <label for="conf_senha">Confirmar Senha: </label>
    <input type="password" name="conf_senha" id="conf_senha"><br>

    <label for="data_nasc">Data de Nascimento: </label>
    <input type="date" name="data_nasc" id="data_nasc"><br>

    <label for="hora">Hora Atual: </label>
    <input type="time" name="hora" id="hora"><br>

    <label for="genero">Genero: </label>
    <select name="genero" id="genero">
        <option value="m">Masculino</option>
        <option value="f">Feminino</option>
        <option value="o">Outro</option>
    </select>
    <button type="submit">Enviar</button>
    </form>
</main>