# money-machine
A budgeting app


# The JSON API should respond with this JSON

```markdown
{
  "current_balance": 405,
  [
    {
      "description": "groceries",
      "amount": 55,
      "date": "2018-07-09"
    },
    {
      "description": "clothes",
      "amount": 120,
      "date": "2018-07-03"
    },
  ]
}
```

# The JSON API should accept a JSON object like this

```markdown
{
  "userid": 34,
  "description": "clothes",
  "amount": 120,
  "date": "2018-07-03"
}
```
