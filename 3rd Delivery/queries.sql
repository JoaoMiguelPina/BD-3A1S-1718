--a)Qual o nome do fornecedor que forneceu o maior número de categorias?
  --Note que pode ser mais do que um fornecedor.

-----------------------------------------------

SELECT nome
FROM fornecedor
WHERE nif = (
  SELECT forn
  FROM (
    SELECT forn
    FROM (
      (SELECT forn_primario as forn, categoria FROM produto)
      UNION (   --tabela com nif e categoria de todos os fornecedores
      SELECT nif as forn, categoria FROM (
          (SELECT ean, categoria FROM produto) as ps natural join fornece_sec) as fs )
    ) as forncat
    GROUP BY forn
    HAVING COUNT(categoria) >= all(
      SELECT nrcat as n
      FROM (
        SELECT COUNT(categoria) as nrcat
        FROM (
          (SELECT forn_primario as forn, categoria FROM produto)
            UNION
          (SELECT nif as forn, categoria FROM (
            (SELECT ean,categoria FROM produto) as ps natural join fornece_sec) as fs )
        ) as forncat
      GROUP BY forn) as lel)
  )as a);

--b)Quais os fornecedores primários (nome e nif) que forneceram produtos de todas a categorias simples

SELECT nif, nome
FROM fornecedor
WHERE nif in (
  ( SELECT forn_primario --aqui começa uma divisao de producto pela tabela de todas as cats simples
    FROM produto as newprod
    WHERE categoria in (SELECT nome FROM categoria_simples as cs)
    GROUP BY forn_primario
    HAVING COUNT(*) = (
      SELECT COUNT(*)
      FROM categoria_simples as num_categoria
    )--aqui acaba uma divisao
  )
);


--c)Quais os produtos (ean) que nunca foram repostos?

SELECT ean
FROM produto
WHERE ean NOT IN (SELECT ean FROM reposicao);


--d) Quais os produtos (ean) com um número de fornecedores secundários superior a 10?

SELECT ean
FROM (SELECT ean
      FROM fornece_sec as count_aux
      GROUP BY ean
      HAVING count(ean) > 10) as count_secundarios;

--e)Quais os produtos (ean) que foram repostos sempre pelo mesmo operador?

SELECT ean
FROM (SELECT ean
      FROM reposicao as count_aux
      GROUP BY ean
      HAVING count(operador) = 1) as single_operadores;
