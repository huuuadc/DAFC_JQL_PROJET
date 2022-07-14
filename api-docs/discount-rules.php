<h1 id="discount-rules">Discount Rules</h1>
<p>The Discount Rules API allows you to create, view, and delete individual Discount Rules.</p>
<h2 id="discount-rule-properties">Discount Rule properties</h2>
<table>
    <thead>
        <tr>
            <th>Attribute</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>id</code></td>
            <td>integer</td>
            <td>Unique identifier for the resource. <i class="label label-info">read-only</i></td>
        </tr>
        <tr>
            <td><code>enabled</code></td>
            <td>integer</td>
            <td></td>
        </tr>
        <tr>
            <td><code>deleted</code></td>
            <td>integer</td>
            <td></td>
        </tr>
        <tr>
            <td><code>exclusive</code></td>
            <td>integer</td>
            <td></td>
        </tr>
        <tr>
            <td><code>title</code></td>
            <td>string</td>
            <td></td>
        </tr>
        <tr>
            <td><code>priority</code></td>
            <td>integer</td>
            <td></td>
        </tr>
        <tr>
            <td><code>filters</code></td>
            <td>array</td>
            <td>See <a href="#discount-rule-filters-properties">Discount Rule - Filters properties</a></td>
        </tr>
        <tr>
            <td><code>conditions</code></td>
            <td>array</td>
            <td>See <a href="#discount-rule-conditions-properties">Discount Rule - Conditions properties</a></td>
        </tr>
        <tr>
            <td><code>product_adjustments</code></td>
            <td>array</td>
            <td>See <a href="#discount-rule-product_adjustments-properties">Discount Rule - Product adjustments properties</a></td>
        </tr>
        <tr>
            <td><code>cart_adjustments</code></td>
            <td>array</td>
            <td>See <a href="#discount-rule-cart_adjustments-properties">Discount Rule - Cart adjustments properties</a></td>
        </tr>
        <tr>
            <td><code>buy_x_get_x_adjustments</code></td>
            <td>array</td>
            <td>See <a href="#discount-rule-buy_x_get_x_adjustments-properties">Discount Rule - Buy x get x adjustments properties</a></td>
        </tr>
        <tr>
            <td><code>buy_x_get_y_adjustments</code></td>
            <td>array</td>
            <td>See <a href="#discount-rule-buy_x_get_y_adjustments-properties">Discount Rule - Buy x get y adjustments properties</a></td>
        </tr>
        <tr>
            <td><code>bulk_adjustments</code></td>
            <td>array</td>
            <td>See <a href="#discount-rule-bulk_adjustments-properties">Discount Rule - Bulk adjustments properties</a></td>
        </tr>
        <tr>
            <td><code>set_adjustments</code></td>
            <td>array</td>
            <td>See <a href="#discount-rule-set_adjustments-properties">Discount Rule - Set adjustments properties</a></td>
        </tr>
        <tr>
            <td><code>other_discounts</code></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><code>date_from</code></td>
            <td>date-time</td>
            <td></td>
        </tr>
        <tr>
            <td><code>date_to</code></td>
            <td>date-time</td>
            <td></td>
        </tr>
        <tr>
            <td><code>usage_limits</code></td>
            <td>integer</td>
            <td></td>
        </tr>
        <tr>
            <td><code>rule_language</code></td>
            <td>array</td>
            <td>See <a href="#discount-rule-rule_language-properties">Discount Rule - Rule language properties</a></td>
        </tr>
        <tr>
            <td><code>used_limits</code></td>
            <td>integer</td>
            <td></td>
        </tr>
        <tr>
            <td><code>additional</code></td>
            <td>array</td>
            <td>See <a href="#discount-rule-additional-properties">Discount Rule - Additional properties</a></td>
        </tr>
        <tr>
            <td><code>max_discount_sum</code></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td><code>advanced_discount_message</code></td>
            <td>array</td>
            <td>See <a href="#discount-rule-advanced_discount_message-properties">Discount Rule - Advanced discount message properties</a></td>
        </tr>
        <tr>
            <td><code>discount_type</code></td>
            <td>string</td>
            <td>Options:
              <ul>
                <li><code>wdr_simple_discount</code> Product Adjustment</li>
                <li><code>wdr_cart_discount</code> Cart Adjustment</li>
                <li><code>wdr_free_shipping</code> Free Shipping</li>
                <li><code>wdr_bulk_discount</code> Bulk Discount</li>
                <li><code>wdr_set_discount</code> Bundle (Set) Discount</li>
                <li><code>wdr_buy_x_get_x_discount</code> Buy X get X</li>
                <li><code>wdr_buy_x_get_y_discount</code> wdr_buy_x_get_y_discount</li>
              </ul>
            </td>
        </tr>
        <tr>
            <td><code>used_coupons</code></td>
            <td>array</td>
            <td>See <a href="#discount-rule-used_coupons-properties">Discount Rule - Used coupons properties</a></td>
        </tr>
        <tr>
            <td><code>created_by</code></td>
            <td>integer</td>
            <td></td>
        </tr>
        <tr>
            <td><code>created_on</code></td>
            <td>date-time</td>
            <td></td>
        </tr>
        <tr>
            <td><code>modified_by</code></td>
            <td>integer</td>
            <td></td>
        </tr>
        <tr>
            <td><code>modified_on</code></td>
            <td>date-time</td>
            <td></td>
        </tr>
    </tbody>
</table>



<h3 id="discount-rule-filters-properties">Discount Rule - Filters properties</h3>
<table>
    <thead>
        <tr>
            <th>Attribute</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>type</code></td>
            <td>string</td>
            <td>Options:
              <ul>
                <li><code>all_products</code> All Products</li>
                <li><code>products</code> Products</li>
                <li><code>product_category</code> Category</li>
                <li><code>product_attributes</code> Attributes</li>
                <li><code>product_tags</code> Tags</li>
                <li><code>product_sku</code> SKUs</li>
                <li><code>product_on_sale</code> On sale products</li>
              </ul>
            </td>
        </tr>
		<tr>
            <td><code>method</code></td>
            <td>string</td>
            <td>Options:
              <ul>
                <li><code>in_list</code> In List</li>
                <li><code>not_in_list</code> Not In List</li>
              </ul>
            </td>
        </tr>
		<tr>
            <td><code>value</code></td>
            <td>array</td>
            <td></td>
        </tr>
    </tbody>
</table>

<h3 id="discount-rule-conditions-properties">Discount Rule - Conditions properties</h3>
<table>
    <thead>
        <tr>
            <th>Attribute</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
		<tr>
            <td><code>id</code></td>
            <td>integer</td>
            <td>Meta ID. <i class="label label-info">read-only</i></td>
        </tr>
        <tr>
            <td><code>key</code></td>
            <td>string</td>
            <td>Meta key.</td>
        </tr>
        <tr>
            <td><code>value</code></td>
            <td>string</td>
            <td>Meta value.</td>
        </tr>
    </tbody>
</table>

<h3 id="discount-rule-product_adjustments-properties">Discount Rule - Product adjustments properties</h3>
<table>
    <thead>
        <tr>
            <th>Attribute</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
		<tr>
            <td><code>type</code></td>
            <td>string</td>
            <td>Options:
              <ul>
                <li><code>percentage</code> Percentage discount</li>
                <li><code>flat</code> Fixed discount</li>
				<li><code>fixed_price</code> Fixed price per item</li>
              </ul>
            </td>
        </tr>
		<tr>
            <td><code>value</code></td>
            <td>integer</td>
            <td></td>
        </tr>
    </tbody>
</table>

<h3 id="discount-rule-cart_adjustments-properties">Discount Rule - Cart adjustments properties</h3>
<table>
    <thead>
        <tr>
            <th>Attribute</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>type</code></td>
            <td>string</td>
            <td>Options:
              <ul>
                <li><code>percentage</code> Percentage discount</li>
                <li><code>flat_in_subtotal</code> Fixed discount</li>
				<li><code>flat</code> Fixed discount per product</li>
              </ul>
            </td>
        </tr>
		<tr>
            <td><code>value</code></td>
            <td>integer</td>
            <td></td>
        </tr>
		<tr>
            <td><code>label</code></td>
            <td>string</td>
            <td></td>
        </tr>
    </tbody>
</table>

<h3 id="discount-rule-buy_x_get_x_adjustments-properties">Discount Rule - Buy x get x adjustments properties</h3>
<table>
    <thead>
        <tr>
            <th>Attribute</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
		<tr>
            <td><code>ranges</code></td>
            <td>array</td>
            <td>{“ranges”:[{"from":"1","to":"1","free_qty":"1","free_type":"free_product","free_value":"1"}]}</td>
        </tr>
    </tbody>
</table>

<h3 id="discount-rule-buy_x_get_y_adjustments-properties">Discount Rule - Buy x get y adjustments properties</h3>
<table>
    <thead>
        <tr>
            <th>Attribute</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>type</code></td>
            <td>string</td>
            <td>Options:
              <ul>
                <li><code>bxgy_product</code> Buy X Get Y - Products </li>
                <li><code>bxgy_category</code> Buy X Get Y - Categories</li>
				<li><code>bxgy_all</code> Buy X Get Y - All</li>
              </ul>
            </td>
        </tr>
    </tbody>
</table>

<h3 id="discount-rule-bulk_adjustments-properties">Discount Rule - Bulk adjustments properties</h3>
<table>
    <thead>
        <tr>
            <th>Attribute</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>id</code></td>
            <td>integer</td>
            <td>Meta ID. <i class="label label-info">read-only</i></td>
        </tr>
        <tr>
            <td><code>key</code></td>
            <td>string</td>
            <td>Meta key.</td>
        </tr>
        <tr>
            <td><code>value</code></td>
            <td>string</td>
            <td>Meta value.</td>
        </tr>
    </tbody>
</table>

<h3 id="discount-rule-set_adjustments-properties">Discount Rule - Set adjustments properties</h3>
<table>
    <thead>
        <tr>
            <th>Attribute</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>id</code></td>
            <td>integer</td>
            <td>Meta ID. <i class="label label-info">read-only</i></td>
        </tr>
        <tr>
            <td><code>key</code></td>
            <td>string</td>
            <td>Meta key.</td>
        </tr>
        <tr>
            <td><code>value</code></td>
            <td>string</td>
            <td>Meta value.</td>
        </tr>
    </tbody>
</table>

<h3 id="discount-rule-rule_language-properties">Discount Rule - Rule language properties</h3>
<table>
    <thead>
        <tr>
            <th>Attribute</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>id</code></td>
            <td>integer</td>
            <td>Meta ID. <i class="label label-info">read-only</i></td>
        </tr>
        <tr>
            <td><code>key</code></td>
            <td>string</td>
            <td>Meta key.</td>
        </tr>
        <tr>
            <td><code>value</code></td>
            <td>string</td>
            <td>Meta value.</td>
        </tr>
    </tbody>
</table>

<h3 id="discount-rule-additional-properties">Discount Rule - Additional properties</h3>
<table>
    <thead>
        <tr>
            <th>Attribute</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>id</code></td>
            <td>integer</td>
            <td>Meta ID. <i class="label label-info">read-only</i></td>
        </tr>
        <tr>
            <td><code>key</code></td>
            <td>string</td>
            <td>Meta key.</td>
        </tr>
        <tr>
            <td><code>value</code></td>
            <td>string</td>
            <td>Meta value.</td>
        </tr>
    </tbody>
</table>

<h3 id="discount-rule-advanced_discount_message-properties">Discount Rule - Advanced discount message properties</h3>
<table>
    <thead>
        <tr>
            <th>Attribute</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>id</code></td>
            <td>integer</td>
            <td>Meta ID. <i class="label label-info">read-only</i></td>
        </tr>
        <tr>
            <td><code>key</code></td>
            <td>string</td>
            <td>Meta key.</td>
        </tr>
        <tr>
            <td><code>value</code></td>
            <td>string</td>
            <td>Meta value.</td>
        </tr>
    </tbody>
</table>

<h3 id="discount-rule-used_coupons-properties">Discount Rule - Used coupons properties</h3>
<table>
    <thead>
        <tr>
            <th>Attribute</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>id</code></td>
            <td>integer</td>
            <td>Meta ID. <i class="label label-info">read-only</i></td>
        </tr>
        <tr>
            <td><code>key</code></td>
            <td>string</td>
            <td>Meta key.</td>
        </tr>
        <tr>
            <td><code>value</code></td>
            <td>string</td>
            <td>Meta value.</td>
        </tr>
    </tbody>
</table>












<!-- <h2 id="create-a-refund">Create a refund</h2>
<p>This API helps you to create a new refund for an order.</p>
<h3 id="http-request">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-post">POST</i>
        <h6>/wp-json/wc/v3/orders/&lt;id&gt;/refunds</h6>
    </div>
</div>
<div class="highlight">
    <pre class="highlight shell tab-shell" style=""><code>curl <span class="nt">-X</span> POST <?php echo $domain; ?>wp-json/wc/v3/orders/723/refunds <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret <span class="se">\</span>
    <span class="nt">-H</span> <span class="s2">"Content-Type: application/json"</span> <span class="se">\</span>
    <span class="nt">-d</span> <span class="s1">'{
  "amount": "30",  
  "line_items": [
    {
      "id": "111",
      "refund_total": 10,
      "refund_tax": [
        {
          "id" "222",
          "refund_total": 20
        }
      ]
    }
}'</span>
</code></pre>
</div>
<div class="highlight">
    <pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="kd">const</span> <span class="nx">data</span> <span class="o">=</span> <span class="p">{</span>
    <span class="na">amount</span><span class="p">:</span> <span class="dl">"</span><span class="s2">30</span><span class="dl">"</span><span class="p">,</span>
    <span class="na">line_items</span><span class="p">:</span> <span class="p">[</span>
      <span class="p">{</span>
         <span class="na">id</span><span class="p">:</span> <span class="dl">"</span><span class="s2">111</span><span class="dl">"</span><span class="p">,</span>
         <span class="na">refund_total</span><span class="p">:</span> <span class="mi">10</span><span class="p">,</span>
         <span class="na">refund_tax</span><span class="p">:</span> <span class="p">[</span>
           <span class="p">{</span>
             <span class="na">id</span><span class="p">:</span> <span class="dl">"</span><span class="s2">222</span><span class="dl">"</span><span class="p">,</span>
             <span class="na">refund_total</span><span class="p">:</span> <span class="mi">20</span>
           <span class="p">}</span>
         <span class="p">]</span>
      <span class="p">}</span>
   <span class="p">]</span>
<span class="p">};</span>

<span class="nx">WooCommerce</span><span class="p">.</span><span class="nx">post</span><span class="p">(</span><span class="dl">"</span><span class="s2">orders/723/refunds</span><span class="dl">"</span><span class="p">,</span> <span class="nx">data</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre>
</div>
<div class="highlight">
    <pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span>
<span class="nv">$data</span> <span class="o">=</span> <span class="p">[</span>
     <span class="s1">'amount'</span> <span class="o">=&gt;</span> <span class="s1">'30'</span><span class="p">,</span>
     <span class="s1">'line_items'</span> <span class="o">=&gt;</span> <span class="p">[</span>
       <span class="p">[</span>
           <span class="s1">'id'</span> <span class="o">=&gt;</span> <span class="s1">'111'</span><span class="p">,</span>
           <span class="s1">'refund_total'</span> <span class="o">=&gt;</span> <span class="mi">10</span><span class="p">,</span>
           <span class="s1">'refund_tax'</span> <span class="o">=&gt;</span> <span class="p">[</span>
              <span class="p">[</span>
                 <span class="s1">'id'</span> <span class="o">=&gt;</span> <span class="s1">'222'</span><span class="p">,</span>
                 <span class="s1">'amount'</span> <span class="o">=&gt;</span> <span class="mi">20</span>
              <span class="p">]</span>
           <span class="p">]</span>
       <span class="p">]</span>
     <span class="p">]</span>
<span class="p">];</span>

<span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">post</span><span class="p">(</span><span class="s1">'orders/723/refunds'</span><span class="p">,</span> <span class="nv">$data</span><span class="p">));</span>
<span class="cp">?&gt;</span>
</code></pre>
</div>
<div class="highlight">
    <pre class="highlight python tab-python" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
    <span class="s">"amount"</span><span class="p">:</span> <span class="s">"30"</span><span class="p">,</span>
    <span class="s">"line_items"</span><span class="p">:</span> <span class="p">[</span>
      <span class="p">{</span>
         <span class="s">"id"</span><span class="p">:</span> <span class="s">"111"</span><span class="p">,</span>
         <span class="s">"refund_total"</span><span class="p">:</span> <span class="mi">10</span><span class="p">,</span>
         <span class="s">"refund_tax"</span><span class="p">:</span> <span class="p">[</span>
           <span class="p">{</span>
             <span class="s">"id"</span> <span class="s">"222"</span><span class="p">,</span>
             <span class="s">"refund_total"</span><span class="p">:</span> <span class="mi">20</span>
           <span class="p">}</span>
         <span class="p">]</span>
      <span class="p">}</span>
   <span class="p">]</span>
<span class="p">}</span>

<span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">post</span><span class="p">(</span><span class="s">"orders/723/refunds"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre>
</div>
<div class="highlight">
    <pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="ss">amount: </span><span class="s2">"30"</span><span class="p">,</span>
  <span class="ss">line_items: </span><span class="p">[</span>
    <span class="p">{</span>
       <span class="ss">id: </span><span class="s2">"111"</span><span class="p">,</span>
       <span class="ss">refund_total: </span><span class="mi">10</span><span class="p">,</span>
       <span class="ss">refund_tax: </span><span class="p">[</span>
         <span class="p">{</span>
           <span class="nb">id</span> <span class="s2">"222"</span><span class="p">,</span>
           <span class="ss">refund_total: </span><span class="mi">20</span>
         <span class="p">}</span>
       <span class="p">]</span>
    <span class="p">}</span>
 <span class="p">]</span>
<span class="p">}</span>

<span class="n">woocommerce</span><span class="p">.</span><span class="nf">post</span><span class="p">(</span><span class="s2">"orders/723/refunds"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre>
</div>
<blockquote>
    <p>JSON response example:</p>
</blockquote>
<div class="highlight">
    <pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">726</span><span class="p">,</span><span class="w">
  </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-21T17:07:11"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-21T20:07:11"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"amount"</span><span class="p">:</span><span class="w"> </span><span class="s2">"10.00"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"reason"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
  </span><span class="nl">"refunded_by"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
  </span><span class="nl">"refunded_payment"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
  </span><span class="nl">"meta_data"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
  </span><span class="nl">"line_items"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
  </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
    </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/orders/723/refunds/726"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/orders/723/refunds"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"up"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/orders/723"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
</div>
<h2 id="retrieve-a-refund">Retrieve a refund</h2>
<p>This API lets you retrieve and view a specific refund from an order.</p>
<h3 id="http-request-2">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-get">GET</i>
        <h6>/wp-json/wc/v3/orders/&lt;id&gt;/refunds/&lt;refund_id&gt;</h6>
    </div>
</div>
<div class="highlight">
    <pre class="highlight shell tab-shell" style=""><code>curl <?php echo $domain; ?>wp-json/wc/v3/orders/723/refunds/726 <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre>
</div>
<div class="highlight">
    <pre
        class="highlight javascript tab-javascript"
        style="display: none;"
    ><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">orders/723/refunds/726</span><span class="dl">"</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre>
</div>
<div class="highlight">
    <pre
        class="highlight php tab-php"
        style="display: none;"
    ><code><span class="cp">&lt;?php</span> <span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">get</span><span class="p">(</span><span class="s1">'orders/723/refunds/726'</span><span class="p">));</span> <span class="cp">?&gt;</span>
</code></pre>
</div>
<div class="highlight">
    <pre
        class="highlight python tab-python"
        style="display: none;"
    ><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">get</span><span class="p">(</span><span class="s">"orders/723/refunds/726"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre>
</div>
<div class="highlight">
    <pre
        class="highlight ruby tab-ruby"
        style="display: none;"
    ><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="s2">"orders/723/refunds/726"</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre>
</div>
<blockquote>
    <p>JSON response example:</p>
</blockquote>
<div class="highlight">
    <pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">726</span><span class="p">,</span><span class="w">
  </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-21T17:07:11"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-21T20:07:11"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"amount"</span><span class="p">:</span><span class="w"> </span><span class="s2">"10.00"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"reason"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
  </span><span class="nl">"refunded_by"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
  </span><span class="nl">"refunded_payment"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
  </span><span class="nl">"meta_data"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
  </span><span class="nl">"line_items"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
  </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
    </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/orders/723/refunds/726"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/orders/723/refunds"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"up"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/orders/723"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
</div>
<h4 id="available-parameters">Available parameters</h4>
<table>
    <thead>
        <tr>
            <th>Parameter</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>dp</code></td>
            <td>string</td>
            <td>Number of decimal points to use in each resource.</td>
        </tr>
    </tbody>
</table>
<h2 id="list-all-refunds">List all refunds</h2>
<p>This API helps you to view all the refunds from an order.</p>
<h3 id="http-request-3">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-get">GET</i>
        <h6>/wp-json/wc/v3/orders/&lt;id&gt;/refunds</h6>
    </div>
</div>
<div class="highlight">
    <pre class="highlight shell tab-shell" style=""><code>curl <?php echo $domain; ?>wp-json/wc/v3/orders/723/refunds <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre>
</div>
<div class="highlight">
    <pre
        class="highlight javascript tab-javascript"
        style="display: none;"
    ><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">orders/723/refunds</span><span class="dl">"</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre>
</div>
<div class="highlight">
    <pre
        class="highlight php tab-php"
        style="display: none;"
    ><code><span class="cp">&lt;?php</span> <span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">get</span><span class="p">(</span><span class="s1">'orders/723/refunds'</span><span class="p">));</span> <span class="cp">?&gt;</span>
</code></pre>
</div>
<div class="highlight">
    <pre
        class="highlight python tab-python"
        style="display: none;"
    ><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">get</span><span class="p">(</span><span class="s">"orders/723/refunds"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre>
</div>
<div class="highlight">
    <pre
        class="highlight ruby tab-ruby"
        style="display: none;"
    ><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="s2">"orders/723/refunds"</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre>
</div>
<blockquote>
    <p>JSON response example:</p>
</blockquote>
<div class="highlight">
    <pre class="highlight json tab-json"><code><span class="p">[</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">726</span><span class="p">,</span><span class="w">
    </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-21T17:07:11"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-21T20:07:11"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"amount"</span><span class="p">:</span><span class="w"> </span><span class="s2">"10.00"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"reason"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"refunded_by"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
    </span><span class="nl">"refunded_payment"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
    </span><span class="nl">"meta_data"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"line_items"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/orders/723/refunds/726"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/orders/723/refunds"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"up"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/orders/723"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">724</span><span class="p">,</span><span class="w">
    </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-21T16:55:37"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-21T19:55:37"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"amount"</span><span class="p">:</span><span class="w"> </span><span class="s2">"9.00"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"reason"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"refunded_by"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
    </span><span class="nl">"refunded_payment"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
    </span><span class="nl">"meta_data"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"line_items"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">314</span><span class="p">,</span><span class="w">
        </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Woo Album #2"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"product_id"</span><span class="p">:</span><span class="w"> </span><span class="mi">87</span><span class="p">,</span><span class="w">
        </span><span class="nl">"variation_id"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="nl">"quantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">-1</span><span class="p">,</span><span class="w">
        </span><span class="nl">"tax_class"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
        </span><span class="nl">"subtotal"</span><span class="p">:</span><span class="w"> </span><span class="s2">"-9.00"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"subtotal_tax"</span><span class="p">:</span><span class="w"> </span><span class="s2">"0.00"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total"</span><span class="p">:</span><span class="w"> </span><span class="s2">"-9.00"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total_tax"</span><span class="p">:</span><span class="w"> </span><span class="s2">"0.00"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"taxes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
        </span><span class="nl">"meta_data"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">2076</span><span class="p">,</span><span class="w">
            </span><span class="nl">"key"</span><span class="p">:</span><span class="w"> </span><span class="s2">"_refunded_item_id"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"value"</span><span class="p">:</span><span class="w"> </span><span class="s2">"311"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"sku"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
        </span><span class="nl">"price"</span><span class="p">:</span><span class="w"> </span><span class="mi">-9</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/orders/723/refunds/724"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/orders/723/refunds"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"up"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/orders/723"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">]</span><span class="w">
</span></code></pre>
</div>
<h4 id="available-parameters-2">Available parameters</h4>
<table>
    <thead>
        <tr>
            <th>Parameter</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>context</code></td>
            <td>string</td>
            <td>Scope under which the request is made; determines fields present in response. Options: <code>view</code> and <code>edit</code>. Default is <code>view</code>.</td>
        </tr>
        <tr>
            <td><code>page</code></td>
            <td>integer</td>
            <td>Current page of the collection. Default is <code>1</code>.</td>
        </tr>
        <tr>
            <td><code>per_page</code></td>
            <td>integer</td>
            <td>Maximum number of items to be returned in result set. Default is <code>10</code>.</td>
        </tr>
        <tr>
            <td><code>search</code></td>
            <td>string</td>
            <td>Limit results to those matching a string.</td>
        </tr>
        <tr>
            <td><code>after</code></td>
            <td>string</td>
            <td>Limit response to resources published after a given ISO8601 compliant date.</td>
        </tr>
        <tr>
            <td><code>before</code></td>
            <td>string</td>
            <td>Limit response to resources published before a given ISO8601 compliant date.</td>
        </tr>
        <tr>
            <td><code>exclude</code></td>
            <td>array</td>
            <td>Ensure result set excludes specific IDs.</td>
        </tr>
        <tr>
            <td><code>include</code></td>
            <td>array</td>
            <td>Limit result set to specific ids.</td>
        </tr>
        <tr>
            <td><code>offset</code></td>
            <td>integer</td>
            <td>Offset the result set by a specific number of items.</td>
        </tr>
        <tr>
            <td><code>order</code></td>
            <td>string</td>
            <td>Order sort attribute ascending or descending. Options: <code>asc</code> and <code>desc</code>. Default is <code>desc</code>.</td>
        </tr>
        <tr>
            <td><code>orderby</code></td>
            <td>string</td>
            <td>Sort collection by object attribute. Options: <code>date</code>, <code>id</code>, <code>include</code>, <code>title</code> and <code>slug</code>. Default is <code>date</code>.</td>
        </tr>
        <tr>
            <td><code>parent</code></td>
            <td>array</td>
            <td>Limit result set to those of particular parent IDs.</td>
        </tr>
        <tr>
            <td><code>parent_exclude</code></td>
            <td>array</td>
            <td>Limit result set to all items except those of a particular parent ID.</td>
        </tr>
        <tr>
            <td><code>dp</code></td>
            <td>integer</td>
            <td>Number of decimal points to use in each resource. Default is <code>2</code>.</td>
        </tr>
    </tbody>
</table>
<h2 id="delete-a-refund">Delete a refund</h2>
<p>This API helps you delete an order refund.</p>
<h3 id="http-request-4">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-delete">DELETE</i>
        <h6>/wp-json/wc/v3/orders/&lt;id&gt;/refunds/&lt;refund_id&gt;</h6>
    </div>
</div>
<div class="highlight">
    <pre class="highlight shell tab-shell" style=""><code>curl <span class="nt">-X</span> DELETE <?php echo $domain; ?>wp-json/wc/v3/orders/723/refunds/726?force<span class="o">=</span><span class="nb">true</span> <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre>
</div>
<div class="highlight">
    <pre
        class="highlight javascript tab-javascript"
        style="display: none;"
    ><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="k">delete</span><span class="p">(</span><span class="dl">"</span><span class="s2">orders/723/refunds/726</span><span class="dl">"</span><span class="p">,</span> <span class="p">{</span>
  <span class="na">force</span><span class="p">:</span> <span class="kc">true</span>
<span class="p">})</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre>
</div>
<div class="highlight">
    <pre
        class="highlight php tab-php"
        style="display: none;"
    ><code><span class="cp">&lt;?php</span> <span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nb">delete</span><span class="p">(</span><span class="s1">'orders/723/refunds/726'</span><span class="p">,</span> <span class="p">[</span><span class="s1">'force'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">]));</span> <span class="cp">?&gt;</span>
</code></pre>
</div>
<div class="highlight">
    <pre
        class="highlight python tab-python"
        style="display: none;"
    ><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">delete</span><span class="p">(</span><span class="s">"orders/723/refunds/726"</span><span class="p">,</span> <span class="n">params</span><span class="o">=</span><span class="p">{</span><span class="s">"force"</span><span class="p">:</span> <span class="bp">True</span><span class="p">}).</span><span class="n">json</span><span class="p">())</span>
</code></pre>
</div>
<div class="highlight">
    <pre
        class="highlight ruby tab-ruby"
        style="display: none;"
    ><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">delete</span><span class="p">(</span><span class="s2">"orders/723/refunds/726"</span><span class="p">,</span> <span class="ss">force: </span><span class="kp">true</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre>
</div>
<blockquote>
    <p>JSON response example:</p>
</blockquote>
<div class="highlight">
    <pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">726</span><span class="p">,</span><span class="w">
  </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-21T17:07:11"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2017-03-21T20:07:11"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"amount"</span><span class="p">:</span><span class="w"> </span><span class="s2">"10.00"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"reason"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
  </span><span class="nl">"refunded_by"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
  </span><span class="nl">"refunded_payment"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
  </span><span class="nl">"meta_data"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
  </span><span class="nl">"line_items"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
  </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
    </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/orders/723/refunds/726"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/orders/723/refunds"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"up"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/orders/723"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
</div>
<h4 id="available-parameters-3">Available parameters</h4>
<table>
    <thead>
        <tr>
            <th>Parameter</th>
            <th>Type</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><code>force</code></td>
            <td>string</td>
            <td>Required to be <code>true</code>, as resource does not support trashing.</td>
        </tr>
    </tbody>
</table> -->
