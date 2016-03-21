# InMe分享页第二期

此工程为InMe手机端分享页的第二期前端开发

## 环境
* 工程采用gulp打包，需要安装好gulp，安装命令npm install -g gulp
* 采用js库Vuejs和jquery

## 开发和编译
* 首先执行npm install安装依赖库
* 执行gulp命令，在public目录中生成编译结果文件
* 开发时，可以执行gulp watch此命令会利用browsersync建立http环境，并且能够实现自动监听、打包、刷新浏览器功能
* gulp clean清空编译结果

## 页面说明
* 每日情绪测试题目页面  
  test_question.html?type=common


* 压力测试题目页面  
    test_question.html?scaleportfolioid=[1, 2, 3]  
  如:  
    test_question.html?scaleportfolioid=1


* 情绪测试结果分享页面  
  test_mood_result.html?share=1&hid=[每日测试历史ID, 可选]&detail=[测试结果详情, 可选]&portid[测试组合id, 可选]  
  如：  
  test_mood_result.html?share=1&detail=%5B%7B"oid":"rnuURcqdhPsvVxbv/6FJLQ==","score":12%7D,%7B"oid":"zVq5yNGJRofg7sltJhDHpA==","score":12%7D,%7B"oid":"5xuAJNl5IwgQVYA+Q40eAg==","score":8%7D,%7B"oid":"YlomG9XgW0kKl1B+GhH9/w==","score":8%7D,%7B"oid":"3jUcnHO4qXIyvd+uHJhgHw==","score":8%7D,%7B"oid":"U6/exWsZIHbQBtOdhykxwg==","score":15%7D%5D&portid=


* 情绪测试结果页面  
  test_mood_result.html?hid=[每日测试历史ID, 可选]&detail=[测试结果详情, 可选]&portid[测试组合id, 可选]  
  如：  
  test_mood_result.html?detail=%5B%7B"oid":"rnuURcqdhPsvVxbv/6FJLQ==","score":12%7D,%7B"oid":"zVq5yNGJRofg7sltJhDHpA==","score":12%7D,%7B"oid":"5xuAJNl5IwgQVYA+Q40eAg==","score":8%7D,%7B"oid":"YlomG9XgW0kKl1B+GhH9/w==","score":8%7D,%7B"oid":"3jUcnHO4qXIyvd+uHJhgHw==","score":8%7D,%7B"oid":"U6/exWsZIHbQBtOdhykxwg==","score":15%7D%5D&portid=


* 压力测试结果分享页面  
  test_presure_result.html?share=1&scaleportfolioid=[1, 2, 3]&resultscore=50&testtime=[时间戳]  
  如：  
  test_presure_result.html?share=1&scaleportfolioid=1&resultscore=80&testtime=1452156418


* 压力测试结果页面  
  test_presure_result.html?scaleportfolioid=[1, 2, 3]&resultscore=[分数]  
  如：  
  test_presure_result.html?scaleportfolioid=1&resultscore=80


* 文章详情页面  
  article.html?id=[文章id]&isnext[0, 1 下一篇文章，可选]  
  如：  
  article.html?id=wte7b7+g/N5qf0JWMMvqYA==


* 文章列表页面  
  article_list.html?classid=[分类id]  
  如：  
  article_list.html?classid=odj3KUdCCJTNb3gZ9zpeRg==


* 服务详情页面  
  goods.html?psyid=[咨询师uid]&citycode=[城市编码]  
  如：  
  goods.html?psyid=QA5eZfQS3eRMcrpRU/4Opg==&citycode=010


* 服务详情-每个商品详情页面  
  goods_item.html?psyid=[咨询师uid]&citycode=[城市编码]&otype=[对象类型]&oid=[对象id]  
  如：  
  goods_item.html?psyid=QA5eZfQS3eRMcrpRU/4Opg==&citycode=010&otype=6&oid=poD1i2aZXHg/zeCwRZw3kQ==


* 话题页面  
  topic.html?id=[帖子id]  
  如：  
  topic.html?id=b364L9dP2HEB2LnbI8Qngg==


* 话题列表页面  
  topic_list.html?id=[话题ID]  
  如：  
  topic_list.html?id=b364L9dP2HEB2LnbI8Qngg==


* 话题表单提交页面  
  topic_form.html?id=[帖子ID]  
  如：  
  topic_form.html?id=b364L9dP2HEB2LnbI8Qngg==


* 话题问答页面  
  topic_question.html?id=[问答ID]  
  如：  
  topic_question.html?id=poD1i2aZXHg/zeCwRZw3kQ==


## 补充页面说明：
分享的页面多一个参数share=1
题目页面 根据type=common来确定是情绪测试，不加则是压力测试