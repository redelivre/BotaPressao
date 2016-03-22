# Deputados
É um Plugin para o gerenciamento de deputados no wordpress, mas tb serve para senadores ;)

# Inserindo novos campos input e textarea

Atualmente podemos inseirir dois tipos de campos rapidamente usando a função get_metas em deputados.php:

```
function get_metas()´
{
  return array(
    array ( 
        'label' => 'Partido', 
        'slug'=>'deputado_partido' ,
        'info' => 'Nenhum Partido Informado' , 
        'html' => array ('
                        tag'=> 'input', 
                        'type' => 'text' 
                        )
        ),
    array ( 
        'label' => 'Proposta de Campanha', 
        'slug'=>'deputado_prooposta' ,
        'info' => 'Nenhum Proposta Encontrada', 
        'html' => array (
                        'tag'=> 'textarea', 
                        'rows' => 4 , 
                        'cols' => 50 
                        ) 
        ),
  ); 
}
```
