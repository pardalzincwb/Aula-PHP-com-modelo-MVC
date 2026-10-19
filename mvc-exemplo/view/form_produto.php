<?php // view/form_produto.php ?>
<div class="form-container">
    <h2>Cadastrar Novo Produto</h2>

        <?php if (!empty($mensagem)): ?>
        <div class="alert <?php echo (!empty($sucesso) && $sucesso === true) ? 'alert-success' : 'alert-danger'; ?>">
            <?php echo htmlspecialchars($mensagem); ?>
        </div>
    <?php endif; ?>


    <form action="index.php?action=cadastrar" method="POST">
        <div class="form-group">
            <label for="nome">Nome do Produto:</label>
            <input type="text" id="nome" name="nome" placeholder="Ex: Monitor UltraWide" required>
        </div>

        <div class="form-group">
            <label for="preco">Preço (R$):</label>
            <input type="number" id="preco" name="preco" step="0.01" placeholder="Ex: 1499.90" required>
        </div>

        <button type="submit">Adicionar Produto</button>
    </form>
</div>
