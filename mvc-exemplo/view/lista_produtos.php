<?php // view/lista_produtos.php ?>
<div class="table-container">
    <h2>Produtos Cadastrados</h2>

    <?php if (empty($produtos)): ?>
        <p class="empty-message">Nenhum produto cadastrado até o momento.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?php echo $produto->getId(); ?></td>
                        <td><?php echo htmlspecialchars($produto->getNome()); ?></td>
                        <td>R$ <?php echo number_format($produto->getPreco(), 2, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
