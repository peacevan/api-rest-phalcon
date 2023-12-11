# Api-Rest-Phalcon

![[Pasted image 20231211074620.png]]



> um api rest em phalcon.

### Ajustes e melhorias

O projeto ainda está em desenvolvimento e as próximas atualizações serão voltadas nas seguintes tarefas:

- [x] crud products
- [ ] crud users
- [ ] crud clients
- [ ] orders
- [ ] item_orders

## 💻 Pré-requisitos

Antes de começar, verifique se você atendeu aos seguintes requisitos:

* Você instalou a versão mais recente de `<PHP 8.1.0 / dependência / requeridos>`
* Você tem uma máquina `<Windows>`. 
* Você leu `<https://medium.com/@peacevan/criando-api-com-phalcon-83779d21141c>`.

## 🚀 Instalando  # Api-Rest-Phalcon

Para instalar o   Api-Rest-Phalcon, siga estas etapas:


Windows:
```
<comando_de_instalação>
```

## ☕ Usando <Api_Rest_Phalcon>

Para usar <Api_Rest_Phalcon>, siga estas etapas:

```
https://phalcon.test/product  
retorno  
[  
 {  
  "id": 7,  
  "description": "teste",  
  "title": "",  
  "price": 1  
 },  
 {  
  "id": 9,  
  "description": "teste",  
  "title": null,  
  "price": 1  
 },  
 {  
  "id": 10,  
  "description": "teste",  
  "title": "produto teste",  
  "price": 1  
 }  
]  
  
  
  
https://phalcon.test/product/find/id  
retorno  
{  
 "id": 7,  
 "tenant_id": 1,  
 "uuid": "teste",  
 "title": "",  
 "flag": "1",  
 "image": "teste",  
 "price": 1,  
 "description": "teste",  
 "created_at": "2023-12-10 20:39:57",  
 "updated_at": "2023-12-10 22:26:51"  
}  
  
    
  
https://phalcon.test/product/remove/id  
retorno   
{  
 "success": true,  
 "result": true  
}  
  
    

https://phalcon.test/product/create  
  
 {  
    
  "tenantId": 1,  
   "description": "teste",  
   "flag": 1,  
   "image": "teste",  
   "price": 1,  
   "title": "titulo teste",  
   "uuid": "dgfdgfdgfdgfdg654",  
  "title":"produto teste"  
 }

https://phalcon.test/product/update/id  
 {  
   "id":"7",  
  "tenantId": 1,  
   "description": "teste",  
   "flag": 1,  
   "image": "teste",  
   "price": 1,  
   "title": "titulo teste",  
   "uuid": "dgfdgfdgfdgfdg654",  
  "title":"produto teste"  
 }
```


## 📫 Contribuindo para <Api_Rest_Phalcon>

Para contribuir com <Api_Rest_Phalcon>, siga estas etapas:

1. Bifurque este repositório.
2. Crie um branch: `git checkout -b <nome_branch>`.
3. Faça suas alterações e confirme-as: `git commit -m '<mensagem_commit>'`
4. Envie para o branch original: `git push origin <Api-Rest-Phalcon> / <local>`
5. Crie a solicitação de pull.

Como alternativa, consulte a documentação do GitHub em [como criar uma solicitação pull](https://help.github.com/en/github/collaborating-with-issues-and-pull-requests/creating-a-pull-request).

## 🤝 Colaboradores

Agradecemos às seguintes pessoas que contribuíram para este projeto:

## 😄 Seja um dos contribuidores<br>

Quer fazer parte desse projeto? Clique [AQUI](CONTRIBUTING.md) e leia como contribuir.

## 📝 Licença

Esse projeto está sob licença. Veja o arquivo [LICENÇA](LICENSE.md) para mais detalhes.

[⬆ Voltar ao topo](#nome-do-projeto)<br>
