# Moneybird API Endpoints Backlog

This document tracks the implementation progress of all Moneybird API endpoints in this PHP client.

## Administration
1. [x] GET /administrations - Get administrations
2. [x] GET /administrations/{id} - Get administration

## Contacts
3. [x] GET /contacts - List all contacts (paginate)
4. [x] GET /contacts/filter - Filter contacts
5. [x] GET /contacts/synchronization - List all ids and versions
6. [x] POST /contacts/synchronization - Fetch contacts with given ids
7. [x] GET /contacts/{id} - Get contact
8. [x] GET /contacts/customer_id/{customer_id} - Get contact by customer id
9. [x] POST /contacts - Create a new contact
10. [x] PATCH /contacts/{id} - Update a contact
11. [x] DELETE /contacts/{id} - Delete a contact
12. [x] POST /contacts/{id}/additional_charges - Create an additional charge to be invoiced at start of next period
13. [x] GET /contacts/{id}/additional_charges - Get additional charges
14. [x] POST /contacts/{id}/notes - Adds note to entity
15. [x] DELETE /contacts/{id}/notes/{note_id} - Destroys note from entity
16. [x] GET /contacts/{id}/contact_people/{contact_person_id} - Get contact person
17. [x] POST /contacts/{id}/contact_people - Create a new contact person
18. [x] PATCH /contacts/{id}/contact_people/{contact_person_id} - Update a contact person
19. [x] DELETE /contacts/{id}/contact_people/{contact_person_id} - Delete a contact person
20. [x] GET /contacts/{id}/mb_payments_mandate - Get Moneybird Payments mandate
21. [x] POST /contacts/{id}/mb_payments_mandate - Request a new Moneybird Payments mandate
22. [x] POST /contacts/{id}/mb_payments_mandate_url - Request an URL for setting up a Moneybird Payments mandate
23. [x] DELETE /contacts/{id}/mb_payments_mandate - Delete a stored Moneybird Payments mandate

## Custom Fields
24. [x] GET /custom_fields - List all custom fields
25. [x] GET /custom_fields/{id} - Get custom field

## Document Styles
26. [x] GET /document_styles - List all document styles
27. [x] GET /document_styles/{id} - Get document style

## Documents: General Documents
28. [x] GET /documents/general_documents - Get general documents
29. [x] GET /documents/general_documents/synchronization - List all ids and versions
30. [x] POST /documents/general_documents/synchronization - Fetch general documents with given ids
31. [x] GET /documents/general_documents/{id} - Get general document
32. [x] POST /documents/general_documents - Create general document
33. [x] PATCH /documents/general_documents/{id} - Update general document
34. [x] DELETE /documents/general_documents/{id} - Delete general document
35. [x] POST /documents/general_documents/{id}/attachments - Create attachment
36. [x] DELETE /documents/general_documents/{id}/attachments/{attachment_id} - Delete attachment

## Documents: General Journal Documents
37. [x] GET /documents/general_journal_documents - Get general journal documents
38. [x] GET /documents/general_journal_documents/synchronization - List all ids and versions
39. [x] POST /documents/general_journal_documents/synchronization - Fetch general journal documents with given ids
40. [x] GET /documents/general_journal_documents/{id} - Get general journal document
41. [x] POST /documents/general_journal_documents - Create general journal document
42. [x] PATCH /documents/general_journal_documents/{id} - Update general journal document
43. [x] DELETE /documents/general_journal_documents/{id} - Delete general journal document
44. [x] POST /documents/general_journal_documents/{id}/attachments - Create attachment
45. [x] DELETE /documents/general_journal_documents/{id}/attachments/{attachment_id} - Delete attachment

## Documents: Purchase Invoices
46. [x] GET /documents/purchase_invoices - Get purchase invoices
47. [x] GET /documents/purchase_invoices/synchronization - List all ids and versions
48. [x] POST /documents/purchase_invoices/synchronization - Fetch purchase invoices with given ids
49. [x] GET /documents/purchase_invoices/{id} - Get purchase invoice
50. [x] POST /documents/purchase_invoices - Create purchase invoice
51. [x] PATCH /documents/purchase_invoices/{id} - Update purchase invoice
52. [x] DELETE /documents/purchase_invoices/{id} - Delete purchase invoice
53. [x] POST /documents/purchase_invoices/{id}/attachments - Create attachment
54. [x] DELETE /documents/purchase_invoices/{id}/attachments/{attachment_id} - Delete attachment

## Documents: Receipts
55. [x] GET /documents/receipts - Get receipts
56. [x] GET /documents/receipts/synchronization - List all ids and versions
57. [x] POST /documents/receipts/synchronization - Fetch receipts with given ids
58. [x] GET /documents/receipts/{id} - Get receipt
59. [x] POST /documents/receipts - Create receipt
60. [x] PATCH /documents/receipts/{id} - Update receipt
61. [x] DELETE /documents/receipts/{id} - Delete receipt
62. [x] POST /documents/receipts/{id}/attachments - Create attachment
63. [x] DELETE /documents/receipts/{id}/attachments/{attachment_id} - Delete attachment

## Documents: Typeless Documents
64. [x] GET /documents/typeless_documents - Get typeless documents
65. [x] GET /documents/typeless_documents/synchronization - List all ids and versions
66. [x] POST /documents/typeless_documents/synchronization - Fetch typeless documents with given ids
67. [x] GET /documents/typeless_documents/{id} - Get typeless document
68. [x] POST /documents/typeless_documents - Create typeless document
69. [x] PATCH /documents/typeless_documents/{id} - Update typeless document
70. [x] DELETE /documents/typeless_documents/{id} - Delete typeless document
71. [x] POST /documents/typeless_documents/{id}/attachments - Create attachment
72. [x] DELETE /documents/typeless_documents/{id}/attachments/{attachment_id} - Delete attachment

## Estimates
73. [x] GET /estimates - Get estimates
74. [x] GET /estimates/synchronization - List all ids and versions
75. [x] POST /estimates/synchronization - Fetch estimates with given ids
76. [x] GET /estimates/{id} - Get estimate
77. [x] POST /estimates - Create estimate
78. [x] PATCH /estimates/{id} - Update estimate
79. [x] DELETE /estimates/{id} - Delete estimate
80. [x] PATCH /estimates/{id}/change_state/{state} - Change estimate state
81. [x] POST /estimates/{id}/send_email - Send estimate by email
82. [x] GET /estimates/{id}/send_email_template - Get send estimate email template
83. [x] POST /estimates/{id}/duplicate - Duplicate estimate

## External Sales Invoices
84. [x] GET /external_sales_invoices - List all external sales invoices (paginate)
85. [x] GET /external_sales_invoices/synchronization - List all ids and versions
86. [x] POST /external_sales_invoices/synchronization - Fetch external sales invoices with given ids
87. [x] GET /external_sales_invoices/{id} - Get external sales invoice
88. [x] POST /external_sales_invoices - Create external sales invoice
89. [x] PATCH /external_sales_invoices/{id} - Update external sales invoice
90. [x] DELETE /external_sales_invoices/{id} - Delete external sales invoice
91. [x] POST /external_sales_invoices/{id}/payments - Create payment for external sales invoice
92. [x] DELETE /external_sales_invoices/{id}/payments/{payment_id} - Delete payment for external sales invoice
93. [x] POST /external_sales_invoices/{id}/attachments - Create attachment for external sales invoice

## Financial Accounts
94. [x] GET /financial_accounts - Get financial accounts
95. [x] GET /financial_accounts/{id} - Get financial account

## Financial Mutations
96. [x] GET /financial_mutations - Get financial mutations
97. [x] GET /financial_mutations/synchronization - List all ids and versions
98. [x] POST /financial_mutations/synchronization - Fetch financial mutations with given ids
99. [x] GET /financial_mutations/{id} - Get financial mutation
100. [x] PATCH /financial_mutations/{id} - Update financial mutation
101. [x] POST /financial_mutations/{id}/link_booking - Link booking to financial mutation

## Financial Statements
102. [x] GET /financial_statements - Get financial statements
103. [x] GET /financial_statements/synchronization - List all ids and versions
104. [x] POST /financial_statements/synchronization - Fetch financial statements with given ids
105. [x] GET /financial_statements/{id} - Get financial statement
106. [x] POST /financial_statements - Create financial statement
107. [x] PATCH /financial_statements/{id} - Update financial statement
108. [x] DELETE /financial_statements/{id} - Delete financial statement

## Identities
109. [x] GET /identities - Get identities
110. [x] GET /identities/{id} - Get identity

## Import Mappings
111. [x] GET /import_mappings - Get import mappings
112. [x] GET /import_mappings/{id} - Get import mapping
113. [x] POST /import_mappings - Create import mapping
114. [x] PATCH /import_mappings/{id} - Update import mapping
115. [x] DELETE /import_mappings/{id} - Delete import mapping

## Ledger Accounts
116. [x] GET /ledger_accounts - Get ledger accounts
117. [x] GET /ledger_accounts/{id} - Get ledger account
118. [x] POST /ledger_accounts - Create ledger account
119. [x] PATCH /ledger_accounts/{id} - Update ledger account
120. [x] DELETE /ledger_accounts/{id} - Delete ledger account

## Payments
121. [x] GET /payments - Get payments
122. [x] GET /payments/{id} - Get payment

## Products
123. [x] GET /products - Get products
124. [x] GET /products/synchronization - List all ids and versions
125. [x] POST /products/synchronization - Fetch products with given ids
126. [x] GET /products/{id} - Get product
127. [x] POST /products - Create product
128. [x] PATCH /products/{id} - Update product
129. [x] DELETE /products/{id} - Delete product

## Projects
130. [x] GET /projects - Get projects
131. [x] GET /projects/{id} - Get project
132. [x] POST /projects - Create project
133. [x] PATCH /projects/{id} - Update project
134. [x] DELETE /projects/{id} - Delete project

## Purchase Transactions
135. [x] GET /purchase_transactions - Get purchase transactions
136. [x] GET /purchase_transactions/{id} - Get purchase transaction
137. [x] POST /purchase_transactions - Create purchase transaction
138. [x] PATCH /purchase_transactions/{id} - Update purchase transaction
139. [x] DELETE /purchase_transactions/{id} - Delete purchase transaction

## Recurring Sales Invoices
140. [x] GET /recurring_sales_invoices - Get recurring sales invoices
141. [x] GET /recurring_sales_invoices/synchronization - List all ids and versions
142. [x] POST /recurring_sales_invoices/synchronization - Fetch recurring sales invoices with given ids
143. [x] GET /recurring_sales_invoices/{id} - Get recurring sales invoice
144. [x] POST /recurring_sales_invoices - Create recurring sales invoice
145. [x] PATCH /recurring_sales_invoices/{id} - Update recurring sales invoice
146. [x] DELETE /recurring_sales_invoices/{id} - Delete recurring sales invoice

## Sales Invoices
147. [x] GET /sales_invoices - List all sales invoices (paginate)
148. [x] GET /sales_invoices/synchronization - List all ids and versions
149. [x] POST /sales_invoices/synchronization - Fetch sales invoices with given ids
150. [x] GET /sales_invoices/{id} - Get sales invoice
151. [x] GET /sales_invoices/find_by_invoice_id/{invoice_id} - Find sales invoice by invoice id
152. [x] GET /sales_invoices/find_by_reference/{reference} - Find sales invoice by reference
153. [x] POST /sales_invoices - Create sales invoice
154. [x] PATCH /sales_invoices/{id} - Update sales invoice
155. [x] DELETE /sales_invoices/{id} - Delete sales invoice
156. [x] POST /sales_invoices/{id}/payments - Create payment for sales invoice
157. [x] DELETE /sales_invoices/{id}/payments/{payment_id} - Delete payment for sales invoice
158. [x] POST /sales_invoices/{id}/send_email - Send sales invoice by email
159. [x] GET /sales_invoices/{id}/send_email_template - Get send sales invoice email template
160. [x] POST /sales_invoices/{id}/send_reminder - Send sales invoice reminder by email
161. [x] GET /sales_invoices/{id}/send_reminder_template - Get send sales invoice reminder email template
162. [x] POST /sales_invoices/{id}/send_invoice_reminder - Send invoice reminder by email
163. [x] GET /sales_invoices/{id}/send_invoice_reminder_template - Get send invoice reminder email template
164. [x] POST /sales_invoices/{id}/send_payment_reminder - Send payment reminder by email
165. [x] GET /sales_invoices/{id}/send_payment_reminder_template - Get send payment reminder email template
166. [x] POST /sales_invoices/{id}/send_post - Send sales invoice by post
167. [x] POST /sales_invoices/{id}/mark_as_sent - Mark sales invoice as sent
168. [x] POST /sales_invoices/{id}/mark_as_accepted - Mark sales invoice as accepted
169. [x] POST /sales_invoices/{id}/mark_as_paid - Mark sales invoice as paid
170. [x] POST /sales_invoices/{id}/mark_as_uncollectible - Mark sales invoice as uncollectible
171. [x] POST /sales_invoices/{id}/mark_as_published - Mark sales invoice as published
172. [x] POST /sales_invoices/{id}/mark_as_unpublished - Mark sales invoice as unpublished
173. [x] POST /sales_invoices/{id}/duplicate - Duplicate sales invoice
174. [x] POST /sales_invoices/{id}/duplicate_to_credit_invoice - Duplicate sales invoice to credit invoice

## Subscription Templates
175. [x] GET /subscription_templates - Get subscription templates
176. [x] GET /subscription_templates/{id} - Get subscription template
177. [x] POST /subscription_templates - Create subscription template
178. [x] PATCH /subscription_templates/{id} - Update subscription template
179. [x] DELETE /subscription_templates/{id} - Delete subscription template

## Subscriptions
180. [x] GET /subscriptions - Get subscriptions
181. [x] GET /subscriptions/{id} - Get subscription
182. [x] POST /subscriptions - Create subscription
183. [x] PATCH /subscriptions/{id} - Update subscription
184. [x] DELETE /subscriptions/{id} - Delete subscription
185. [x] POST /subscriptions/{id}/pause - Pause subscription
186. [x] POST /subscriptions/{id}/resume - Resume subscription
187. [x] POST /subscriptions/{id}/reactivate - Reactivate subscription
188. [x] POST /subscriptions/{id}/duplicate - Duplicate subscription

## Tax Rates
189. [x] GET /tax_rates - List all tax rates (paginate)

## Time Entries
192. [x] GET /time_entries - Get time entries
193. [x] GET /time_entries/{id} - Get time entry
194. [x] POST /time_entries - Create time entry
195. [x] PATCH /time_entries/{id} - Update time entry
196. [x] DELETE /time_entries/{id} - Delete time entry

## Users
197. [x] GET /users - Get users
198. [x] GET /users/{id} - Get user

## Verifications
199. [x] GET /verifications - Get verifications
200. [x] GET /verifications/{id} - Get verification
201. [x] POST /verifications - Create verification
202. [x] PATCH /verifications/{id} - Update verification
203. [x] DELETE /verifications/{id} - Delete verification
