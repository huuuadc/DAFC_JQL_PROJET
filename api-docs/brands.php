<h1 id="product-brands">Product brands</h1>
<p>The product brands API allows you to create, view, update, and delete individual, or a batch, of brands.</p>
<h2 id="product-brand-properties">Product brand properties</h2>
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
            <td><code>offline_id</code></td>
            <td>integer</td>
            <td>Offline Id.</td>
        </tr>
        <tr>
            <td><code>name</code></td>
            <td>string</td>
            <td>brand name. <i class="label label-info">mandatory</i></td>
        </tr>
        <tr>
            <td><code>slug</code></td>
            <td>string</td>
            <td>An alphanumeric identifier for the resource unique to its type.</td>
        </tr>
        <tr>
            <td><code>parent</code></td>
            <td>integer</td>
            <td>The ID for the parent of the resource.</td>
        </tr>
        <tr>
            <td><code>description</code></td>
            <td>string</td>
            <td>HTML description of the resource.</td>
        </tr>
        <tr>
            <td><code>count</code></td>
            <td>integer</td>
            <td>Number of published products for the resource. <i class="label label-info">read-only</i></td>
        </tr>
    </tbody>
</table>
<h2 id="create-a-product-brand">Create a product brand</h2>
<p>This API helps you to create a new product brand.</p>
<h3 id="http-request">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-post">POST</i>
        <h6>/wp-json/wc/v3/products/brands</h6>
    </div>
</div>

<blockquote>
    <p>Example of how to create a product brand:</p>
</blockquote>
<div class="highlight">
    <pre class="highlight shell tab-shell" style=""><code>curl <span class="nt">-X</span> POST <?php echo $domain; ?>wp-json/wc/v3/products/brands <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret <span class="se">\</span>
    <span class="nt">-H</span> <span class="s2">"Content-Type: application/json"</span> <span class="se">\</span>
    <span class="nt">-d</span> <span class="s1">'{
  "name": "Burberry"
}'</span>
</code></pre>
</div>
<div class="highlight">
    <pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="kd">const</span> <span class="nx">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">Burberry</span><span class="dl">"</span><span class="p">,</span>
  <span class="na">image</span><span class="p">:</span> <span class="p">{</span>
    <span class="na">src</span><span class="p">:</span> <span class="dl">"</span><span class="s2">http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_front.jpg</span><span class="dl">"</span>
  <span class="p">}</span>
<span class="p">};</span>

<span class="nx">WooCommerce</span><span class="p">.</span><span class="nx">post</span><span class="p">(</span><span class="dl">"</span><span class="s2">products/brands</span><span class="dl">"</span><span class="p">,</span> <span class="nx">data</span><span class="p">)</span>
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
    <span class="s2">"name' =&gt; 'Burberry',
    'image' =&gt; [
        'src' =&gt; 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_front.jpg'
    ]
];

print_r(</span><span class="nv">$woocommerce-&gt;post</span><span class="s2">('products/brands', </span><span class="nv">$data</span><span class="s2">));
?&gt;
</span></code></pre>
</div>
<div class="highlight">
    <pre class="highlight python tab-python" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
    <span class="s">"name"</span><span class="p">:</span> <span class="s">"Burberry"</span><span class="p">,</span>
    <span class="s">"image"</span><span class="p">:</span> <span class="p">{</span>
        <span class="s">"src"</span><span class="p">:</span> <span class="s">"http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_front.jpg"</span>
    <span class="p">}</span>
<span class="p">}</span>

<span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">post</span><span class="p">(</span><span class="s">"products/brands"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre>
</div>
<div class="highlight">
    <pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="ss">name: </span><span class="s2">"Burberry"</span><span class="p">,</span>
  <span class="ss">image: </span><span class="p">{</span>
    <span class="ss">src: </span><span class="s2">"http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_front.jpg"</span>
  <span class="p">}</span>
<span class="p">}</span>

<span class="n">woocommerce</span><span class="p">.</span><span class="nf">post</span><span class="p">(</span><span class="s2">"products/brands"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre>
</div>
<blockquote>
    <p>JSON response example:</p>
</blockquote>
<div class="highlight">
    <pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">9</span><span class="p">,</span><span class="w">
  </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Burberry"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"burberry"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"parent"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
  </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
  </span><span class="nl">"count"</span><span class="p">:</span><span class="w"> </span><span class="mi">36</span><span class="p">,</span><span class="w">
  </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
    </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands/9"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
</div>
<h2 id="retrieve-a-product-brand">Retrieve a product brand</h2>
<p>This API lets you retrieve a product brand by ID.</p>

<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-get">GET</i>
        <h6>/wp-json/wc/v3/products/brands/&lt;id&gt;</h6>
    </div>
</div>
<div class="highlight">
    <pre class="highlight shell tab-shell" style=""><code>curl <?php echo $domain; ?>wp-json/wc/v3/products/brands/9 <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre>
</div>
<div class="highlight">
    <pre
        class="highlight javascript tab-javascript"
        style="display: none;"
    ><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">products/brands/9</span><span class="dl">"</span><span class="p">)</span>
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
    ><code><span class="cp">&lt;?php</span> <span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">get</span><span class="p">(</span><span class="s1">'products/brands/9'</span><span class="p">));</span> <span class="cp">?&gt;</span>
</code></pre>
</div>
<div class="highlight">
    <pre
        class="highlight python tab-python"
        style="display: none;"
    ><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">get</span><span class="p">(</span><span class="s">"products/brands/9"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre>
</div>
<div class="highlight">
    <pre
        class="highlight ruby tab-ruby"
        style="display: none;"
    ><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="s2">"products/brands/9"</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre>
</div>
<blockquote>
    <p>JSON response example:</p>
</blockquote>
<div class="highlight">
    <pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">9</span><span class="p">,</span><span class="w">
  </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Burberry"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"burberry"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"parent"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
  </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
  </span><span class="nl">"count"</span><span class="p">:</span><span class="w"> </span><span class="mi">36</span><span class="p">,</span><span class="w">
  </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
    </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands/9"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
</div>
<h2 id="list-all-product-brands">List all product brands</h2>
<p>This API lets you retrieve all product brands.</p>

<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-get">GET</i>
        <h6>/wp-json/wc/v3/products/brands</h6>
    </div>
</div>
<div class="highlight">
    <pre class="highlight shell tab-shell" style=""><code>curl <?php echo $domain; ?>wp-json/wc/v3/products/brands <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre>
</div>
<div class="highlight">
    <pre
        class="highlight javascript tab-javascript"
        style="display: none;"
    ><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">products/brands</span><span class="dl">"</span><span class="p">)</span>
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
    ><code><span class="cp">&lt;?php</span> <span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">get</span><span class="p">(</span><span class="s1">'products/brands'</span><span class="p">));</span> <span class="cp">?&gt;</span>
</code></pre>
</div>
<div class="highlight">
    <pre
        class="highlight python tab-python"
        style="display: none;"
    ><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">get</span><span class="p">(</span><span class="s">"products/brands"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre>
</div>
<div class="highlight">
    <pre
        class="highlight ruby tab-ruby"
        style="display: none;"
    ><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="s2">"products/brands"</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre>
</div>
<blockquote>
    <p>JSON response example:</p>
</blockquote>
<div class="highlight">
    <pre class="highlight json tab-json"><code><span class="p">[</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">15</span><span class="p">,</span><span class="w">
    </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Albums"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"albums"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent"</span><span class="p">:</span><span class="w"> </span><span class="mi">11</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"count"</span><span class="p">:</span><span class="w"> </span><span class="mi">4</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands/15"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"up"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands/11"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">9</span><span class="p">,</span><span class="w">
    </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Burberry"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"burberry"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"count"</span><span class="p">:</span><span class="w"> </span><span class="mi">36</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://example/wp-json/wc/v3/products/brands/9"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://example/wp-json/wc/v3/products/brands"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">10</span><span class="p">,</span><span class="w">
    </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Hoodies"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"hoodies"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent"</span><span class="p">:</span><span class="w"> </span><span class="mi">9</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"count"</span><span class="p">:</span><span class="w"> </span><span class="mi">6</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands/10"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"up"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands/9"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">11</span><span class="p">,</span><span class="w">
    </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Music"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"music"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"count"</span><span class="p">:</span><span class="w"> </span><span class="mi">7</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands/11"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">12</span><span class="p">,</span><span class="w">
    </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Posters"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"posters"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"count"</span><span class="p">:</span><span class="w"> </span><span class="mi">5</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands/12"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">13</span><span class="p">,</span><span class="w">
    </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Singles"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"singles"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent"</span><span class="p">:</span><span class="w"> </span><span class="mi">11</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"count"</span><span class="p">:</span><span class="w"> </span><span class="mi">3</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands/13"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"up"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands/11"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">14</span><span class="p">,</span><span class="w">
    </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"T-shirts"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"t-shirts"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent"</span><span class="p">:</span><span class="w"> </span><span class="mi">9</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"count"</span><span class="p">:</span><span class="w"> </span><span class="mi">6</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands/14"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"up"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands/9"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">]</span><span class="w">
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
            <td><code>exclude</code></td>
            <td>array</td>
            <td>Ensure result set excludes specific ids.</td>
        </tr>
        <tr>
            <td><code>include</code></td>
            <td>array</td>
            <td>Limit result set to specific ids.</td>
        </tr>
        <tr>
            <td><code>order</code></td>
            <td>string</td>
            <td>Order sort attribute ascending or descending. Options: <code>asc</code> and <code>desc</code>. Default is <code>asc</code>.</td>
        </tr>
        <tr>
            <td><code>orderby</code></td>
            <td>string</td>
            <td>
                Sort collection by resource attribute. Options: <code>id</code>, <code>include</code>, <code>name</code>, <code>slug</code>, <code>term_group</code>, <code>description</code> and <code>count</code>. Default is
                <code>name</code>.
            </td>
        </tr>
        <tr>
            <td><code>hide_empty</code></td>
            <td>boolean</td>
            <td>Whether to hide resources not assigned to any products. Default is <code>false</code>.</td>
        </tr>
        <tr>
            <td><code>parent</code></td>
            <td>integer</td>
            <td>Limit result set to resources assigned to a specific parent.</td>
        </tr>
        <tr>
            <td><code>product</code></td>
            <td>integer</td>
            <td>Limit result set to resources assigned to a specific product.</td>
        </tr>
        <tr>
            <td><code>slug</code></td>
            <td>string</td>
            <td>Limit result set to resources with a specific slug.</td>
        </tr>
    </tbody>
</table>
<h2 id="update-a-product-brand">Update a product brand</h2>
<p>This API lets you make changes to a product brand.</p>
<h3 id="http-request-2">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-put">PUT</i>
        <h6>/wp-json/wc/v3/products/brands/&lt;id&gt;</h6>
    </div>
</div>
<div class="highlight">
    <pre class="highlight shell tab-shell" style=""><code>curl <span class="nt">-X</span> PUT <?php echo $domain; ?>wp-json/wc/v3/products/brands/9 <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret <span class="se">\</span>
    <span class="nt">-H</span> <span class="s2">"Content-Type: application/json"</span> <span class="se">\</span>
    <span class="nt">-d</span> <span class="s1">'{
  "description": "All kinds of clothes."
}'</span>
</code></pre>
</div>
<div class="highlight">
    <pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="kd">const</span> <span class="nx">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="na">description</span><span class="p">:</span> <span class="dl">"</span><span class="s2">All kinds of clothes.</span><span class="dl">"</span>
<span class="p">};</span>

<span class="nx">WooCommerce</span><span class="p">.</span><span class="nx">put</span><span class="p">(</span><span class="dl">"</span><span class="s2">products/brands/9</span><span class="dl">"</span><span class="p">,</span> <span class="nx">data</span><span class="p">)</span>
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
    <span class="s1">'description'</span> <span class="o">=&gt;</span> <span class="s1">'All kinds of clothes.'</span>
<span class="p">];</span>

<span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">put</span><span class="p">(</span><span class="s1">'products/brands/9'</span><span class="p">,</span> <span class="nv">$data</span><span class="p">));</span>
<span class="cp">?&gt;</span>
</code></pre>
</div>
<div class="highlight">
    <pre class="highlight python tab-python" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
    <span class="s">"description"</span><span class="p">:</span> <span class="s">"All kinds of clothes."</span>
<span class="p">}</span>

<span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">put</span><span class="p">(</span><span class="s">"products/brands/9"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre>
</div>
<div class="highlight">
    <pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="ss">description: </span><span class="s2">"All kinds of clothes."</span>
<span class="p">}</span>

<span class="n">woocommerce</span><span class="p">.</span><span class="nf">put</span><span class="p">(</span><span class="s2">"products/brands/9"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre>
</div>
<blockquote>
    <p>JSON response example:</p>
</blockquote>
<div class="highlight">
    <pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">9</span><span class="p">,</span><span class="w">
  </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Burberry"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"burberry"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"parent"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
  </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"All kinds of clothes."</span><span class="p">,</span><span class="w">
  </span><span class="nl">"count"</span><span class="p">:</span><span class="w"> </span><span class="mi">36</span><span class="p">,</span><span class="w">
  </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
    </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands/9"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
</div>
<h2 id="delete-a-product-brand">Delete a product brand</h2>
<p>This API helps you delete a product brand.</p>
<h3 id="http-request-3">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-delete">DELETE</i>
        <h6>/wp-json/wc/v3/products/brands/&lt;id&gt;</h6>
    </div>
</div>
<div class="highlight">
    <pre class="highlight shell tab-shell" style=""><code>curl <span class="nt">-X</span> DELETE <?php echo $domain; ?>wp-json/wc/v3/products/brands/9?force<span class="o">=</span><span class="nb">true</span> <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre>
</div>
<div class="highlight">
    <pre
        class="highlight javascript tab-javascript"
        style="display: none;"
    ><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="k">delete</span><span class="p">(</span><span class="dl">"</span><span class="s2">products/brands/9</span><span class="dl">"</span><span class="p">,</span> <span class="p">{</span>
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
    ><code><span class="cp">&lt;?php</span> <span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nb">delete</span><span class="p">(</span><span class="s1">'products/brands/9'</span><span class="p">,</span> <span class="p">[</span><span class="s1">'force'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">]));</span> <span class="cp">?&gt;</span>
</code></pre>
</div>
<div class="highlight">
    <pre
        class="highlight python tab-python"
        style="display: none;"
    ><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">delete</span><span class="p">(</span><span class="s">"products/brands/9"</span><span class="p">,</span> <span class="n">params</span><span class="o">=</span><span class="p">{</span><span class="s">"force"</span><span class="p">:</span> <span class="bp">True</span><span class="p">}).</span><span class="n">json</span><span class="p">())</span>
</code></pre>
</div>
<div class="highlight">
    <pre
        class="highlight ruby tab-ruby"
        style="display: none;"
    ><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">delete</span><span class="p">(</span><span class="s2">"products/brands/9"</span><span class="p">,</span> <span class="ss">force: </span><span class="kp">true</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre>
</div>
<blockquote>
    <p>JSON response example:</p>
</blockquote>
<div class="highlight">
    <pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">9</span><span class="p">,</span><span class="w">
  </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Burberry"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"burberry"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"parent"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
  </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"All kinds of clothes."</span><span class="p">,</span><span class="w">
  </span><span class="nl">"count"</span><span class="p">:</span><span class="w"> </span><span class="mi">36</span><span class="p">,</span><span class="w">
  </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
    </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands/9"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
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
            <td><code>force</code></td>
            <td>string</td>
            <td>Required to be <code>true</code>, as resource does not support trashing.</td>
        </tr>
    </tbody>
</table>
<!-- <h2 id="batch-update-product-brands">Batch update product brands</h2>
<p>This API helps you to batch create, update and delete multiple product brands.</p>

<aside class="notice">
    Note: By default it's limited to up to 100 objects to be created, updated or deleted.
</aside>
<h3 id="http-request-4">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-post">POST</i>
        <h6>/wp-json/wc/v3/products/brands/batch</h6>
    </div>
</div>
<div class="highlight">
    <pre class="highlight shell tab-shell" style=""><code>curl <span class="nt">-X</span> POST <?php echo $domain; ?>/wp-json/wc/v3/products/brands/batch <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret <span class="se">\</span>
    <span class="nt">-H</span> <span class="s2">"Content-Type: application/json"</span> <span class="se">\</span>
    <span class="nt">-d</span> <span class="s1">'{
  "create": [
    {
      "name": "Albums"
    },
    {
      "name": "Burberry"
    }
  ],
  "update": [
    {
      "id": 10,
      "description": "Nice hoodies"
    }
  ],
  "delete": [
    11,
    12
  ]
}'</span>
</code></pre>
</div>
<div class="highlight">
    <pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="kd">const</span> <span class="nx">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="na">create</span><span class="p">:</span> <span class="p">[</span>
    <span class="p">{</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">Albums</span><span class="dl">"</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">Burberry</span><span class="dl">"</span>
    <span class="p">}</span>
  <span class="p">],</span>
  <span class="na">update</span><span class="p">:</span> <span class="p">[</span>
    <span class="p">{</span>
      <span class="na">id</span><span class="p">:</span> <span class="mi">10</span><span class="p">,</span>
      <span class="na">description</span><span class="p">:</span> <span class="dl">"</span><span class="s2">Nice hoodies</span><span class="dl">"</span>
    <span class="p">}</span>
  <span class="p">],</span>
  <span class="na">delete</span><span class="p">:</span> <span class="p">[</span>
    <span class="mi">11</span><span class="p">,</span>
    <span class="mi">12</span>
  <span class="p">]</span>
<span class="p">};</span>

<span class="nx">WooCommerce</span><span class="p">.</span><span class="nx">post</span><span class="p">(</span><span class="dl">"</span><span class="s2">products/brands/batch</span><span class="dl">"</span><span class="p">,</span> <span class="nx">data</span><span class="p">)</span>
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
    <span class="s1">'create'</span> <span class="o">=&gt;</span> <span class="p">[</span>
        <span class="p">[</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'Albums'</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'Burberry'</span>
        <span class="p">]</span>
    <span class="p">],</span>
    <span class="s1">'update'</span> <span class="o">=&gt;</span> <span class="p">[</span>
        <span class="p">[</span>
            <span class="s1">'id'</span> <span class="o">=&gt;</span> <span class="mi">10</span><span class="p">,</span>
            <span class="s1">'description'</span> <span class="o">=&gt;</span> <span class="s1">'Nice hoodies'</span>
        <span class="p">]</span>
    <span class="p">],</span>
    <span class="s1">'delete'</span> <span class="o">=&gt;</span> <span class="p">[</span>
    <span class="mi">11</span><span class="p">,</span>
        <span class="mi">12</span>
    <span class="p">]</span>
<span class="p">];</span>

<span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">post</span><span class="p">(</span><span class="s1">'products/brands/batch'</span><span class="p">,</span> <span class="nv">$data</span><span class="p">));</span>
<span class="cp">?&gt;</span>
</code></pre>
</div>
<div class="highlight">
    <pre class="highlight python tab-python" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
    <span class="s">"create"</span><span class="p">:</span> <span class="p">[</span>
        <span class="p">{</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"Albums"</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"Burberry"</span>
        <span class="p">}</span>
    <span class="p">],</span>
    <span class="s">"update"</span><span class="p">:</span> <span class="p">[</span>
        <span class="p">{</span>
            <span class="s">"id"</span><span class="p">:</span> <span class="mi">10</span><span class="p">,</span>
            <span class="s">"description"</span><span class="p">:</span> <span class="s">"Nice hoodies"</span>
        <span class="p">}</span>
    <span class="p">],</span>
    <span class="s">"delete"</span><span class="p">:</span> <span class="p">[</span>
        <span class="mi">11</span><span class="p">,</span>
        <span class="mi">12</span>
    <span class="p">]</span>
<span class="p">}</span>

<span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">post</span><span class="p">(</span><span class="s">"products/brands/batch"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre>
</div>
<div class="highlight">
    <pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="ss">create: </span><span class="p">[</span>
    <span class="p">{</span>
      <span class="ss">name: </span><span class="s2">"Albums"</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">name: </span><span class="s2">"Burberry"</span>
    <span class="p">}</span>
  <span class="p">],</span>
  <span class="ss">update: </span><span class="p">[</span>
    <span class="p">{</span>
      <span class="ss">id: </span><span class="mi">10</span><span class="p">,</span>
      <span class="ss">description: </span><span class="s2">"Nice hoodies"</span>
    <span class="p">}</span>
  <span class="p">],</span>
  <span class="ss">delete: </span><span class="p">[</span>
    <span class="mi">11</span><span class="p">,</span>
    <span class="mi">12</span>
  <span class="p">]</span>
<span class="p">}</span>

<span class="n">woocommerce</span><span class="p">.</span><span class="nf">post</span><span class="p">(</span><span class="s2">"products/brands/batch"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre>
</div>
<blockquote>
    <p>JSON response example:</p>
</blockquote>
<div class="highlight">
    <pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="nl">"create"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">15</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Albums"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"albums"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"parent"</span><span class="p">:</span><span class="w"> </span><span class="mi">11</span><span class="p">,</span><span class="w">
      </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"display"</span><span class="p">:</span><span class="w"> </span><span class="s2">"default"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"image"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"menu_order"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"count"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands/15"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"up"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands/11"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">9</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Burberry"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Burberry"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"parent"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"display"</span><span class="p">:</span><span class="w"> </span><span class="s2">"default"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"image"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"menu_order"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"count"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands/9"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">],</span><span class="w">
  </span><span class="nl">"update"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">10</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Hoodies"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"hoodies"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"parent"</span><span class="p">:</span><span class="w"> </span><span class="mi">9</span><span class="p">,</span><span class="w">
      </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Nice hoodies"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"display"</span><span class="p">:</span><span class="w"> </span><span class="s2">"default"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"image"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"menu_order"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"count"</span><span class="p">:</span><span class="w"> </span><span class="mi">6</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands/10"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"up"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands/9"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">],</span><span class="w">
  </span><span class="nl">"delete"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">11</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Music"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"music"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"parent"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"display"</span><span class="p">:</span><span class="w"> </span><span class="s2">"default"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"image"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"menu_order"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"count"</span><span class="p">:</span><span class="w"> </span><span class="mi">7</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands/11"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">12</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Posters"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"posters"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"parent"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"display"</span><span class="p">:</span><span class="w"> </span><span class="s2">"default"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"image"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"menu_order"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"count"</span><span class="p">:</span><span class="w"> </span><span class="mi">5</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands/12"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/brands"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">]</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre>
</div> -->
