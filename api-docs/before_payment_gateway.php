<h1 id="product-reviews">Product reviews</h1>
<p>The product reviews API allows you to create, view, update, and delete individual, or a batch, of product reviews.</p>
<h2 id="product-review-properties">Product review properties</h2>
<table><thead>
<tr>
<th>Attribute</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code>id</code></td>
<td>integer</td>
<td>Unique identifier for the resource. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>date_created</code></td>
<td>string</td>
<td>The date the review was created, in the site's timezone. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>date_created_gmt</code></td>
<td>string</td>
<td>The date the review was created, as GMT. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>product_id</code></td>
<td>integer</td>
<td>Unique identifier for the product that the review belongs to.</td>
</tr>
<tr>
<td><code>status</code></td>
<td>string</td>
<td>Status of the review. Options: <code>approved</code>, <code>hold</code>, <code>spam</code>, <code>unspam</code>, <code>trash</code> and <code>untrash</code>. Defaults to <code>approved</code>.</td>
</tr>
<tr>
<td><code>reviewer</code></td>
<td>string</td>
<td>Reviewer name.</td>
</tr>
<tr>
<td><code>reviewer_email</code></td>
<td>string</td>
<td>Reviewer email.</td>
</tr>
<tr>
<td><code>review</code></td>
<td>string</td>
<td>The content of the review.</td>
</tr>
<tr>
<td><code>rating</code></td>
<td>integer</td>
<td>Review rating (0 to 5).</td>
</tr>
<tr>
<td><code>verified</code></td>
<td>boolean</td>
<td>Shows if the reviewer bought the product or not.</td>
</tr>
</tbody></table>
<h2 id="create-a-product-review">Create a product review</h2>
<p>This API helps you to create a new product review.</p>
<h3 id="http-request">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-post">POST</i>
        <h6>/wp-json/wc/v3/products/reviews</h6>
    </div>
</div>

<blockquote>
<p>Example of how to create a product review:</p>
</blockquote>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <span class="nt">-X</span> POST <?php echo $domain; ?>wp-json/wc/v3/products/reviews <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret <span class="se">\</span>
    <span class="nt">-H</span> <span class="s2">"Content-Type: application/json"</span> <span class="se">\</span>
    <span class="nt">-d</span> <span class="s1">'{
  "product_id": 22,
  "review": "Nice album!",
  "reviewer": "John Doe",
  "reviewer_email": "john.doe@example.com",
  "rating": 5
}'</span>
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="kd">const</span> <span class="nx">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="na">product_id</span><span class="p">:</span> <span class="mi">22</span><span class="p">,</span>
  <span class="na">review</span><span class="p">:</span> <span class="dl">"</span><span class="s2">Nice album!</span><span class="dl">"</span><span class="p">,</span>
  <span class="na">reviewer</span><span class="p">:</span> <span class="dl">"</span><span class="s2">John Doe</span><span class="dl">"</span><span class="p">,</span>
  <span class="na">reviewer_email</span><span class="p">:</span> <span class="dl">"</span><span class="s2">john.doe@example.com</span><span class="dl">"</span><span class="p">,</span>
  <span class="na">rating</span><span class="p">:</span> <span class="mi">5</span>
<span class="p">};</span>

<span class="nx">WooCommerce</span><span class="p">.</span><span class="nx">post</span><span class="p">(</span><span class="dl">"</span><span class="s2">products/reviews</span><span class="dl">"</span><span class="p">,</span> <span class="nx">data</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span>
<span class="nv">$data</span> <span class="o">=</span> <span class="p">[</span>
    <span class="s1">'product_id'</span> <span class="o">=&gt;</span> <span class="mi">22</span><span class="p">,</span>
    <span class="s1">'review'</span> <span class="o">=&gt;</span> <span class="s1">'Nice album!'</span><span class="p">,</span>
    <span class="s1">'reviewer'</span> <span class="o">=&gt;</span> <span class="s1">'John Doe'</span><span class="p">,</span>
    <span class="s1">'reviewer_email'</span> <span class="o">=&gt;</span> <span class="s1">'john.doe@example.com'</span><span class="p">,</span>
    <span class="s1">'rating'</span> <span class="o">=&gt;</span> <span class="mi">5</span>
<span class="p">];</span>

<span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">post</span><span class="p">(</span><span class="s1">'products/reviews'</span><span class="p">,</span> <span class="nv">$data</span><span class="p">));</span>
<span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
    <span class="s">"product_id"</span><span class="p">:</span> <span class="mi">22</span><span class="p">,</span>
    <span class="s">"review"</span><span class="p">:</span> <span class="s">"Nice album!"</span><span class="p">,</span>
    <span class="s">"reviewer"</span><span class="p">:</span> <span class="s">"John Doe"</span><span class="p">,</span>
    <span class="s">"reviewer_email"</span><span class="p">:</span> <span class="s">"john.doe@example.com"</span><span class="p">,</span>
    <span class="s">"rating"</span><span class="p">:</span> <span class="mi">5</span><span class="p">,</span>
<span class="p">}</span>

<span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">post</span><span class="p">(</span><span class="s">"products/reviews"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="ss">product_id: </span><span class="mi">22</span><span class="p">,</span>
  <span class="ss">review: </span><span class="s2">"Nice album!"</span><span class="p">,</span>
  <span class="ss">reviewer: </span><span class="s2">"John Doe"</span><span class="p">,</span>
  <span class="ss">reviewer_email: </span><span class="s2">"john.doe@example.com"</span><span class="p">,</span>
  <span class="ss">rating: </span><span class="mi">5</span>
<span class="p">}</span>

<span class="n">woocommerce</span><span class="p">.</span><span class="nf">post</span><span class="p">(</span><span class="s2">"products/reviews"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">22</span><span class="p">,</span><span class="w">
    </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2018-10-18T17:59:17"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2018-10-18T20:59:17"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"product_id"</span><span class="p">:</span><span class="w"> </span><span class="mi">22</span><span class="p">,</span><span class="w">
    </span><span class="nl">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"approved"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"reviewer"</span><span class="p">:</span><span class="w"> </span><span class="s2">"John Doe"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"reviewer_email"</span><span class="p">:</span><span class="w"> </span><span class="s2">"john.doe@example.com"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"review"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Nice album!"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"rating"</span><span class="p">:</span><span class="w"> </span><span class="mi">5</span><span class="p">,</span><span class="w">
    </span><span class="nl">"verified"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
    </span><span class="nl">"reviewer_avatar_urls"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"24"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/8eb1b522f60d11fa897de1dc6351b7e8?s=24&amp;d=mm&amp;r=g"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"48"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/8eb1b522f60d11fa897de1dc6351b7e8?s=48&amp;d=mm&amp;r=g"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"96"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/8eb1b522f60d11fa897de1dc6351b7e8?s=96&amp;d=mm&amp;r=g"</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="p">{</span><span class="w">
                </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/reviews/22"</span><span class="w">
            </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="p">{</span><span class="w">
                </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/reviews"</span><span class="w">
            </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"up"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="p">{</span><span class="w">
                </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/22"</span><span class="w">
            </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre></div><h2 id="retrieve-a-product-review">Retrieve a product review</h2>
<p>This API lets you retrieve a product review by ID.</p>

<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-get">GET</i>
        <h6>/wp-json/wc/v3/products/reviews/&lt;id&gt;</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <?php echo $domain; ?>wp-json/wc/v3/products/reviews/22 <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">products/reviews/22</span><span class="dl">"</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span> <span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">get</span><span class="p">(</span><span class="s1">'products/reviews/22'</span><span class="p">));</span> <span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">get</span><span class="p">(</span><span class="s">"products/reviews/22"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="s2">"products/reviews/22"</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">22</span><span class="p">,</span><span class="w">
    </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2018-10-18T17:59:17"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2018-10-18T20:59:17"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"product_id"</span><span class="p">:</span><span class="w"> </span><span class="mi">22</span><span class="p">,</span><span class="w">
    </span><span class="nl">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"approved"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"reviewer"</span><span class="p">:</span><span class="w"> </span><span class="s2">"John Doe"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"reviewer_email"</span><span class="p">:</span><span class="w"> </span><span class="s2">"john.doe@example.com"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"review"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Nice album!"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"rating"</span><span class="p">:</span><span class="w"> </span><span class="mi">5</span><span class="p">,</span><span class="w">
    </span><span class="nl">"verified"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
    </span><span class="nl">"reviewer_avatar_urls"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"24"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/8eb1b522f60d11fa897de1dc6351b7e8?s=24&amp;d=mm&amp;r=g"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"48"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/8eb1b522f60d11fa897de1dc6351b7e8?s=48&amp;d=mm&amp;r=g"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"96"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/8eb1b522f60d11fa897de1dc6351b7e8?s=96&amp;d=mm&amp;r=g"</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="p">{</span><span class="w">
                </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/reviews/22"</span><span class="w">
            </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="p">{</span><span class="w">
                </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/reviews"</span><span class="w">
            </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"up"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="p">{</span><span class="w">
                </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/22"</span><span class="w">
            </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre></div><h2 id="list-all-product-reviews">List all product reviews</h2>
<p>This API lets you retrieve all product review.</p>

<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-get">GET</i>
        <h6>/wp-json/wc/v3/products/reviews</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <?php echo $domain; ?>wp-json/wc/v3/products/reviews <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">products/reviews</span><span class="dl">"</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span> <span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">get</span><span class="p">(</span><span class="s1">'products/reviews'</span><span class="p">));</span> <span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">get</span><span class="p">(</span><span class="s">"products/reviews"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="s2">"products/reviews"</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">[</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">22</span><span class="p">,</span><span class="w">
        </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2018-10-18T17:59:17"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2018-10-18T20:59:17"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"product_id"</span><span class="p">:</span><span class="w"> </span><span class="mi">22</span><span class="p">,</span><span class="w">
        </span><span class="nl">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"approved"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"reviewer"</span><span class="p">:</span><span class="w"> </span><span class="s2">"John Doe"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"reviewer_email"</span><span class="p">:</span><span class="w"> </span><span class="s2">"john.doe@example.com"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"review"</span><span class="p">:</span><span class="w"> </span><span class="s2">"&lt;p&gt;Nice album!&lt;/p&gt;</span><span class="se">\n</span><span class="s2">"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"rating"</span><span class="p">:</span><span class="w"> </span><span class="mi">5</span><span class="p">,</span><span class="w">
        </span><span class="nl">"verified"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
        </span><span class="nl">"reviewer_avatar_urls"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="nl">"24"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/8eb1b522f60d11fa897de1dc6351b7e8?s=24&amp;d=mm&amp;r=g"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"48"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/8eb1b522f60d11fa897de1dc6351b7e8?s=48&amp;d=mm&amp;r=g"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"96"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/8eb1b522f60d11fa897de1dc6351b7e8?s=96&amp;d=mm&amp;r=g"</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/reviews/22"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/reviews"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="nl">"up"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/22"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">]</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">20</span><span class="p">,</span><span class="w">
        </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2018-09-08T21:47:19"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2018-09-09T00:47:19"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"product_id"</span><span class="p">:</span><span class="w"> </span><span class="mi">31</span><span class="p">,</span><span class="w">
        </span><span class="nl">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"approved"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"reviewer"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Claudio Sanches"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"reviewer_email"</span><span class="p">:</span><span class="w"> </span><span class="s2">"john.doe@example.com"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"review"</span><span class="p">:</span><span class="w"> </span><span class="s2">"&lt;p&gt;Now works just fine.&lt;/p&gt;</span><span class="se">\n</span><span class="s2">"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"rating"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
        </span><span class="nl">"verified"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="nl">"reviewer_avatar_urls"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="nl">"24"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/908480753c07509e76322dc17d305c8b?s=24&amp;d=mm&amp;r=g"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"48"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/908480753c07509e76322dc17d305c8b?s=48&amp;d=mm&amp;r=g"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"96"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/908480753c07509e76322dc17d305c8b?s=96&amp;d=mm&amp;r=g"</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/reviews/20"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/reviews"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="nl">"up"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/31"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="nl">"reviewer"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"embeddable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wp/v2/users/1"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">]</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">]</span><span class="w">
</span></code></pre></div><h4 id="available-parameters">Available parameters</h4>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
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
<td>Limit response to reviews published after a given ISO8601 compliant date.</td>
</tr>
<tr>
<td><code>before</code></td>
<td>string</td>
<td>Limit response to reviews published before a given ISO8601 compliant date.</td>
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
<td>Sort collection by resource attribute. Options: <code>date</code>, <code>date_gmt</code>, <code>id</code>, <code>slug</code>, <code>include</code> and <code>product</code>. Default is <code>date_gmt</code>.</td>
</tr>
<tr>
<td><code>reviewer</code></td>
<td>array</td>
<td>Limit result set to reviews assigned to specific user IDs.</td>
</tr>
<tr>
<td><code>reviewer_exclude</code></td>
<td>array</td>
<td>Ensure result set excludes reviews assigned to specific user IDs.</td>
</tr>
<tr>
<td><code>reviewer_email</code></td>
<td>array</td>
<td>Limit result set to that from a specific author email.</td>
</tr>
<tr>
<td><code>product</code></td>
<td>array</td>
<td>Limit result set to reviews assigned to specific product IDs.</td>
</tr>
<tr>
<td><code>status</code></td>
<td>string</td>
<td>Limit result set to reviews assigned a specific status. Options: <code>all</code>, <code>hold</code>, <code>approved</code>, <code>spam</code> and <code>trash</code>. Default is <code>approved</code>.</td>
</tr>
</tbody></table>
<h2 id="update-a-product-review">Update a product review</h2>
<p>This API lets you make changes to a product review.</p>
<h3 id="http-request-2">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-put">PUT</i>
        <h6>/wp-json/wc/v3/products/reviews/&lt;id&gt;</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <span class="nt">-X</span> PUT <?php echo $domain; ?>wp-json/wc/v3/products/reviews/20 <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret <span class="se">\</span>
    <span class="nt">-H</span> <span class="s2">"Content-Type: application/json"</span> <span class="se">\</span>
    <span class="nt">-d</span> <span class="s1">'{
  "rating": 5
}'</span>
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="kd">const</span> <span class="nx">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="na">rating</span><span class="p">:</span> <span class="mi">5</span>
<span class="p">};</span>

<span class="nx">WooCommerce</span><span class="p">.</span><span class="nx">put</span><span class="p">(</span><span class="dl">"</span><span class="s2">products/reviews/20</span><span class="dl">"</span><span class="p">,</span> <span class="nx">data</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span>
<span class="nv">$data</span> <span class="o">=</span> <span class="p">[</span>
    <span class="s1">'rating'</span><span class="o">:</span> <span class="mi">5</span>
<span class="p">];</span>

<span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">put</span><span class="p">(</span><span class="s1">'products/reviews/20'</span><span class="p">,</span> <span class="nv">$data</span><span class="p">));</span>
<span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
    <span class="s">"rating"</span><span class="p">:</span> <span class="mi">5</span>
<span class="p">}</span>

<span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">put</span><span class="p">(</span><span class="s">"products/reviews/20"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="ss">rating: </span><span class="mi">5</span>
<span class="p">}</span>

<span class="n">woocommerce</span><span class="p">.</span><span class="nf">put</span><span class="p">(</span><span class="s2">"products/reviews/20"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">20</span><span class="p">,</span><span class="w">
    </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2018-09-08T21:47:19"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2018-09-09T00:47:19"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"product_id"</span><span class="p">:</span><span class="w"> </span><span class="mi">31</span><span class="p">,</span><span class="w">
    </span><span class="nl">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"approved"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"reviewer"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Claudio Sanches"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"reviewer_email"</span><span class="p">:</span><span class="w"> </span><span class="s2">"john.doe@example.com"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"review"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Now works just fine."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"rating"</span><span class="p">:</span><span class="w"> </span><span class="mi">5</span><span class="p">,</span><span class="w">
    </span><span class="nl">"verified"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
    </span><span class="nl">"reviewer_avatar_urls"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"24"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/908480753c07509e76322dc17d305c8b?s=24&amp;d=mm&amp;r=g"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"48"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/908480753c07509e76322dc17d305c8b?s=48&amp;d=mm&amp;r=g"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"96"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/908480753c07509e76322dc17d305c8b?s=96&amp;d=mm&amp;r=g"</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="p">{</span><span class="w">
                </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/reviews/20"</span><span class="w">
            </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="p">{</span><span class="w">
                </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/reviews"</span><span class="w">
            </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"up"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="p">{</span><span class="w">
                </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/31"</span><span class="w">
            </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"reviewer"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="p">{</span><span class="w">
                </span><span class="nl">"embeddable"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
                </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wp/v2/users/1"</span><span class="w">
            </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre></div><h2 id="delete-a-product-review">Delete a product review</h2>
<p>This API helps you delete a product review.</p>
<h3 id="http-request-3">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-delete">DELETE</i>
        <h6>/wp-json/wc/v3/products/reviews/&lt;id&gt;</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <span class="nt">-X</span> DELETE <?php echo $domain; ?>wp-json/wc/v3/products/reviews/34?force<span class="o">=</span><span class="nb">true</span> <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="k">delete</span><span class="p">(</span><span class="dl">"</span><span class="s2">products/reviews/20</span><span class="dl">"</span><span class="p">,</span> <span class="p">{</span>
  <span class="na">force</span><span class="p">:</span> <span class="kc">true</span>
<span class="p">})</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span> <span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nb">delete</span><span class="p">(</span><span class="s1">'products/reviews/20'</span><span class="p">,</span> <span class="p">[</span><span class="s1">'force'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">]));</span> <span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">delete</span><span class="p">(</span><span class="s">"products/reviews/20"</span><span class="p">,</span> <span class="n">params</span><span class="o">=</span><span class="p">{</span><span class="s">"force"</span><span class="p">:</span> <span class="bp">True</span><span class="p">}).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">delete</span><span class="p">(</span><span class="s2">"products/reviews/20"</span><span class="p">,</span> <span class="ss">force: </span><span class="kp">true</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="nl">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
    </span><span class="nl">"previous"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">20</span><span class="p">,</span><span class="w">
        </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2018-09-08T21:47:19"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2018-09-09T00:47:19"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"product_id"</span><span class="p">:</span><span class="w"> </span><span class="mi">31</span><span class="p">,</span><span class="w">
        </span><span class="nl">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"trash"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"reviewer"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Claudio Sanches"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"reviewer_email"</span><span class="p">:</span><span class="w"> </span><span class="s2">"john.doe@example.com"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"review"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Now works just fine."</span><span class="p">,</span><span class="w">
        </span><span class="nl">"rating"</span><span class="p">:</span><span class="w"> </span><span class="mi">5</span><span class="p">,</span><span class="w">
        </span><span class="nl">"verified"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
        </span><span class="nl">"reviewer_avatar_urls"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="nl">"24"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/908480753c07509e76322dc17d305c8b?s=24&amp;d=mm&amp;r=g"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"48"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/908480753c07509e76322dc17d305c8b?s=48&amp;d=mm&amp;r=g"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"96"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/908480753c07509e76322dc17d305c8b?s=96&amp;d=mm&amp;r=g"</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre></div><h4 id="available-parameters-2">Available parameters</h4>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code>force</code></td>
<td>string</td>
<td>Required to be <code>true</code>, as resource does not support trashing.</td>
</tr>
</tbody></table>
<h2 id="batch-update-product-reviews">Batch update product reviews</h2>
<p>This API helps you to batch create, update and delete multiple product reviews.</p>

<aside class="notice">
Note: By default it's limited to up to 100 objects to be created, updated or deleted. 
</aside>
<h3 id="http-request-4">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-post">POST</i>
        <h6>/wp-json/wc/v3/products/reviews/batch</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <span class="nt">-X</span> POST <?php echo $domain; ?>/wp-json/wc/v3/products/reviews/batch <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret <span class="se">\</span>
    <span class="nt">-H</span> <span class="s2">"Content-Type: application/json"</span> <span class="se">\</span>
    <span class="nt">-d</span> <span class="s1">'{
  "create": [
    {
      "product_id": 22,
      "review": "Looks fine",
      "reviewer": "John Doe",
      "reviewer_email": "john.doe@example.com",
      "rating": 4
    },
    {
      "product_id": 22,
      "review": "I love this album",
      "reviewer": "John Doe",
      "reviewer_email": "john.doe@example.com",
      "rating": 5
    }
  ],
  "update": [
    {
      "id": 7,
      "reviewer": "John Doe",
      "reviewer_email": "john.doe@example.com"
    }
  ],
  "delete": [
    22
  ]
}'</span>
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="kd">const</span> <span class="nx">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="na">create</span><span class="p">:</span> <span class="p">[</span>
    <span class="p">{</span>
      <span class="na">product_id</span><span class="p">:</span> <span class="mi">22</span><span class="p">,</span>
      <span class="na">review</span><span class="p">:</span> <span class="dl">"</span><span class="s2">Looks fine</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">reviewer</span><span class="p">:</span> <span class="dl">"</span><span class="s2">John Doe</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">reviewer_email</span><span class="p">:</span> <span class="dl">"</span><span class="s2">john.doe@example.com</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rating</span><span class="p">:</span> <span class="mi">4</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">product_id</span><span class="p">:</span> <span class="mi">22</span><span class="p">,</span>
      <span class="na">review</span><span class="p">:</span> <span class="dl">"</span><span class="s2">I love this album</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">reviewer</span><span class="p">:</span> <span class="dl">"</span><span class="s2">John Doe</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">reviewer_email</span><span class="p">:</span> <span class="dl">"</span><span class="s2">john.doe@example.com</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rating</span><span class="p">:</span> <span class="mi">5</span>
    <span class="p">}</span>
  <span class="p">],</span>
  <span class="na">update</span><span class="p">:</span> <span class="p">[</span>
    <span class="p">{</span>
      <span class="na">id</span><span class="p">:</span> <span class="mi">7</span><span class="p">,</span>
      <span class="na">reviewer</span><span class="p">:</span> <span class="dl">"</span><span class="s2">John Doe</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">reviewer_email</span><span class="p">:</span> <span class="dl">"</span><span class="s2">john.doe@example.com</span><span class="dl">"</span>
    <span class="p">}</span>
  <span class="p">],</span>
  <span class="na">delete</span><span class="p">:</span> <span class="p">[</span>
    <span class="mi">22</span>
  <span class="p">]</span>
<span class="p">};</span>

<span class="nx">WooCommerce</span><span class="p">.</span><span class="nx">post</span><span class="p">(</span><span class="dl">"</span><span class="s2">products/reviews/batch</span><span class="dl">"</span><span class="p">,</span> <span class="nx">data</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span>
<span class="nv">$data</span> <span class="o">=</span> <span class="p">[</span>
    <span class="s1">'create'</span> <span class="o">=&gt;</span> <span class="p">[</span>
        <span class="p">[</span>
            <span class="s1">'product_id'</span> <span class="o">=&gt;</span> <span class="mi">22</span><span class="p">,</span>
            <span class="s1">'review'</span> <span class="o">=&gt;</span> <span class="s1">'Looks fine'</span><span class="p">,</span>
            <span class="s1">'reviewer'</span> <span class="o">=&gt;</span> <span class="s1">'John Doe'</span><span class="p">,</span>
            <span class="s1">'reviewer_email'</span> <span class="o">=&gt;</span> <span class="s1">'john.doe@example.com'</span><span class="p">,</span>
            <span class="s1">'rating'</span> <span class="o">=&gt;</span> <span class="mi">4</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'product_id'</span> <span class="o">=&gt;</span> <span class="mi">22</span><span class="p">,</span>
            <span class="s1">'review'</span> <span class="o">=&gt;</span> <span class="s1">'I love this album'</span><span class="p">,</span>
            <span class="s1">'reviewer'</span> <span class="o">=&gt;</span> <span class="s1">'John Doe'</span><span class="p">,</span>
            <span class="s1">'reviewer_email'</span> <span class="o">=&gt;</span> <span class="s1">'john.doe@example.com'</span><span class="p">,</span>
            <span class="s1">'rating'</span> <span class="o">=&gt;</span> <span class="mi">5</span>
        <span class="p">]</span>
    <span class="p">],</span>
    <span class="s1">'update'</span> <span class="o">=&gt;</span> <span class="p">[</span>
        <span class="p">[</span>
            <span class="s1">'id'</span> <span class="o">=&gt;</span> <span class="mi">7</span><span class="p">,</span>
            <span class="s1">'reviewer'</span> <span class="o">=&gt;</span> <span class="s1">'John Doe'</span><span class="p">,</span>
            <span class="s1">'reviewer_email'</span> <span class="o">=&gt;</span> <span class="s1">'john.doe@example.com'</span><span class="p">,</span>
        <span class="p">]</span>
    <span class="p">],</span>
    <span class="s1">'delete'</span> <span class="o">=&gt;</span> <span class="p">[</span>
        <span class="mi">22</span>
    <span class="p">]</span>
<span class="p">];</span>

<span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">post</span><span class="p">(</span><span class="s1">'products/reviews/batch'</span><span class="p">,</span> <span class="nv">$data</span><span class="p">));</span>
<span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
    <span class="s">"create"</span><span class="p">:</span> <span class="p">[</span>
        <span class="p">{</span>
            <span class="s">"product_id"</span><span class="p">:</span> <span class="mi">22</span><span class="p">,</span>
            <span class="s">"review"</span><span class="p">:</span> <span class="s">"Looks fine"</span><span class="p">,</span>
            <span class="s">"reviewer"</span><span class="p">:</span> <span class="s">"John Doe"</span><span class="p">,</span>
            <span class="s">"reviewer_email"</span><span class="p">:</span> <span class="s">"john.doe@example.com"</span><span class="p">,</span>
            <span class="s">"rating"</span><span class="p">:</span> <span class="mi">4</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"product_id"</span><span class="p">:</span> <span class="mi">22</span><span class="p">,</span>
            <span class="s">"review"</span><span class="p">:</span> <span class="s">"I love this album"</span><span class="p">,</span>
            <span class="s">"reviewer"</span><span class="p">:</span> <span class="s">"John Doe"</span><span class="p">,</span>
            <span class="s">"reviewer_email"</span><span class="p">:</span> <span class="s">"john.doe@example.com"</span><span class="p">,</span>
            <span class="s">"rating"</span><span class="p">:</span> <span class="mi">5</span>
        <span class="p">}</span>
    <span class="p">],</span>
    <span class="s">"update"</span><span class="p">:</span> <span class="p">[</span>
        <span class="p">{</span>
            <span class="s">"id"</span><span class="p">:</span> <span class="mi">7</span><span class="p">,</span>
            <span class="s">"reviewer"</span><span class="p">:</span> <span class="s">"John Doe"</span><span class="p">,</span>
            <span class="s">"reviewer_email"</span><span class="p">:</span> <span class="s">"john.doe@example.com"</span>
        <span class="p">}</span>
    <span class="p">],</span>
    <span class="s">"delete"</span><span class="p">:</span> <span class="p">[</span>
        <span class="mi">22</span>
    <span class="p">]</span>
<span class="p">}</span>

<span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">post</span><span class="p">(</span><span class="s">"products/reviews/batch"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="ss">create: </span><span class="p">[</span>
    <span class="p">{</span>
      <span class="ss">product_id: </span><span class="s2">"22"</span><span class="p">,</span>
      <span class="ss">review: </span><span class="s2">"Looks fine"</span><span class="p">,</span>
      <span class="ss">reviewer: </span><span class="s2">"John Doe"</span><span class="p">,</span>
      <span class="ss">reviewer_email: </span><span class="s2">"john.doe@example.com"</span><span class="p">,</span>
      <span class="ss">rating: </span><span class="s2">"4"</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">product_id: </span><span class="s2">"22"</span><span class="p">,</span>
      <span class="ss">review: </span><span class="s2">"I love this album"</span><span class="p">,</span>
      <span class="ss">reviewer: </span><span class="s2">"John Doe"</span><span class="p">,</span>
      <span class="ss">reviewer_email: </span><span class="s2">"john.doe@example.com"</span><span class="p">,</span>
      <span class="ss">rating: </span><span class="s2">"5"</span>
    <span class="p">}</span>
  <span class="p">],</span>
  <span class="ss">update: </span><span class="p">[</span>
    <span class="p">{</span>
      <span class="ss">id: </span><span class="mi">7</span><span class="p">,</span>
      <span class="ss">reviewer: </span><span class="s2">"John Doe"</span>
      <span class="ss">reviewer_email: </span><span class="s2">"john.doe@example.com"</span>
    <span class="p">}</span>
  <span class="p">],</span>
  <span class="ss">delete: </span><span class="p">[</span>
    <span class="mi">22</span>
  <span class="p">]</span>
<span class="p">}</span>

<span class="n">woocommerce</span><span class="p">.</span><span class="nf">post</span><span class="p">(</span><span class="s2">"products/reviews/batch"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="nl">"create"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">25</span><span class="p">,</span><span class="w">
            </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2018-10-18T18:37:35"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2018-10-18T21:37:35"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"product_id"</span><span class="p">:</span><span class="w"> </span><span class="mi">22</span><span class="p">,</span><span class="w">
            </span><span class="nl">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"approved"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"reviewer"</span><span class="p">:</span><span class="w"> </span><span class="s2">"John Doe"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"reviewer_email"</span><span class="p">:</span><span class="w"> </span><span class="s2">"john.doe@example.com"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"review"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Looks fine"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"rating"</span><span class="p">:</span><span class="w"> </span><span class="mi">4</span><span class="p">,</span><span class="w">
            </span><span class="nl">"verified"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="nl">"reviewer_avatar_urls"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="nl">"24"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/8eb1b522f60d11fa897de1dc6351b7e8?s=24&amp;d=mm&amp;r=g"</span><span class="p">,</span><span class="w">
                </span><span class="nl">"48"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/8eb1b522f60d11fa897de1dc6351b7e8?s=48&amp;d=mm&amp;r=g"</span><span class="p">,</span><span class="w">
                </span><span class="nl">"96"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/8eb1b522f60d11fa897de1dc6351b7e8?s=96&amp;d=mm&amp;r=g"</span><span class="w">
            </span><span class="p">},</span><span class="w">
            </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                    </span><span class="p">{</span><span class="w">
                        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/reviews/25"</span><span class="w">
                    </span><span class="p">}</span><span class="w">
                </span><span class="p">],</span><span class="w">
                </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                    </span><span class="p">{</span><span class="w">
                        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/reviews"</span><span class="w">
                    </span><span class="p">}</span><span class="w">
                </span><span class="p">],</span><span class="w">
                </span><span class="nl">"up"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                    </span><span class="p">{</span><span class="w">
                        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/22"</span><span class="w">
                    </span><span class="p">}</span><span class="w">
                </span><span class="p">]</span><span class="w">
            </span><span class="p">}</span><span class="w">
        </span><span class="p">},</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">26</span><span class="p">,</span><span class="w">
            </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2018-10-18T18:37:35"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2018-10-18T21:37:35"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"product_id"</span><span class="p">:</span><span class="w"> </span><span class="mi">22</span><span class="p">,</span><span class="w">
            </span><span class="nl">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"approved"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"reviewer"</span><span class="p">:</span><span class="w"> </span><span class="s2">"John Doe"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"reviewer_email"</span><span class="p">:</span><span class="w"> </span><span class="s2">"john.doe@example.com"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"review"</span><span class="p">:</span><span class="w"> </span><span class="s2">"I love this album"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"rating"</span><span class="p">:</span><span class="w"> </span><span class="mi">5</span><span class="p">,</span><span class="w">
            </span><span class="nl">"verified"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="nl">"reviewer_avatar_urls"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="nl">"24"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/8eb1b522f60d11fa897de1dc6351b7e8?s=24&amp;d=mm&amp;r=g"</span><span class="p">,</span><span class="w">
                </span><span class="nl">"48"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/8eb1b522f60d11fa897de1dc6351b7e8?s=48&amp;d=mm&amp;r=g"</span><span class="p">,</span><span class="w">
                </span><span class="nl">"96"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/8eb1b522f60d11fa897de1dc6351b7e8?s=96&amp;d=mm&amp;r=g"</span><span class="w">
            </span><span class="p">},</span><span class="w">
            </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                    </span><span class="p">{</span><span class="w">
                        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/reviews/26"</span><span class="w">
                    </span><span class="p">}</span><span class="w">
                </span><span class="p">],</span><span class="w">
                </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                    </span><span class="p">{</span><span class="w">
                        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/reviews"</span><span class="w">
                    </span><span class="p">}</span><span class="w">
                </span><span class="p">],</span><span class="w">
                </span><span class="nl">"up"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                    </span><span class="p">{</span><span class="w">
                        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/22"</span><span class="w">
                    </span><span class="p">}</span><span class="w">
                </span><span class="p">]</span><span class="w">
            </span><span class="p">}</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"update"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">7</span><span class="p">,</span><span class="w">
            </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2018-07-26T19:29:21"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2018-07-26T22:29:21"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"product_id"</span><span class="p">:</span><span class="w"> </span><span class="mi">66</span><span class="p">,</span><span class="w">
            </span><span class="nl">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"approved"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"reviewer"</span><span class="p">:</span><span class="w"> </span><span class="s2">"John Doe"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"reviewer_email"</span><span class="p">:</span><span class="w"> </span><span class="s2">"john.doe@example.com"</span><span class="p">,</span><span class="w">
            </span><span class="nl">"review"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Not so bad :("</span><span class="p">,</span><span class="w">
            </span><span class="nl">"rating"</span><span class="p">:</span><span class="w"> </span><span class="mi">3</span><span class="p">,</span><span class="w">
            </span><span class="nl">"verified"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
            </span><span class="nl">"reviewer_avatar_urls"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="nl">"24"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/8eb1b522f60d11fa897de1dc6351b7e8?s=24&amp;d=mm&amp;r=g"</span><span class="p">,</span><span class="w">
                </span><span class="nl">"48"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/8eb1b522f60d11fa897de1dc6351b7e8?s=48&amp;d=mm&amp;r=g"</span><span class="p">,</span><span class="w">
                </span><span class="nl">"96"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/8eb1b522f60d11fa897de1dc6351b7e8?s=96&amp;d=mm&amp;r=g"</span><span class="w">
            </span><span class="p">},</span><span class="w">
            </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                    </span><span class="p">{</span><span class="w">
                        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/reviews/7"</span><span class="w">
                    </span><span class="p">}</span><span class="w">
                </span><span class="p">],</span><span class="w">
                </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                    </span><span class="p">{</span><span class="w">
                        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/reviews"</span><span class="w">
                    </span><span class="p">}</span><span class="w">
                </span><span class="p">],</span><span class="w">
                </span><span class="nl">"up"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                    </span><span class="p">{</span><span class="w">
                        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/66"</span><span class="w">
                    </span><span class="p">}</span><span class="w">
                </span><span class="p">]</span><span class="w">
            </span><span class="p">}</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"delete"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
            </span><span class="nl">"deleted"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
            </span><span class="nl">"previous"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">22</span><span class="p">,</span><span class="w">
                </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2018-10-18T17:59:17"</span><span class="p">,</span><span class="w">
                </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2018-10-18T20:59:17"</span><span class="p">,</span><span class="w">
                </span><span class="nl">"product_id"</span><span class="p">:</span><span class="w"> </span><span class="mi">22</span><span class="p">,</span><span class="w">
                </span><span class="nl">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"approved"</span><span class="p">,</span><span class="w">
                </span><span class="nl">"reviewer"</span><span class="p">:</span><span class="w"> </span><span class="s2">"John Doe"</span><span class="p">,</span><span class="w">
                </span><span class="nl">"reviewer_email"</span><span class="p">:</span><span class="w"> </span><span class="s2">"john.doe@example.com"</span><span class="p">,</span><span class="w">
                </span><span class="nl">"review"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Nice album!"</span><span class="p">,</span><span class="w">
                </span><span class="nl">"rating"</span><span class="p">:</span><span class="w"> </span><span class="mi">5</span><span class="p">,</span><span class="w">
                </span><span class="nl">"verified"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
                </span><span class="nl">"reviewer_avatar_urls"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"24"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/8eb1b522f60d11fa897de1dc6351b7e8?s=24&amp;d=mm&amp;r=g"</span><span class="p">,</span><span class="w">
                    </span><span class="nl">"48"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/8eb1b522f60d11fa897de1dc6351b7e8?s=48&amp;d=mm&amp;r=g"</span><span class="p">,</span><span class="w">
                    </span><span class="nl">"96"</span><span class="p">:</span><span class="w"> </span><span class="s2">"https://secure.gravatar.com/avatar/8eb1b522f60d11fa897de1dc6351b7e8?s=96&amp;d=mm&amp;r=g"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">}</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre></div><h1 id="reports">Reports</h1>
<p>The reports API allows you to view all types of reports available.</p>
<h2 id="list-all-reports">List all reports</h2>
<p>This API lets you retrieve and view a simple list of available reports.</p>
<h3 id="http-request">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-get">GET</i>
        <h6>/wp-json/wc/v3/reports</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <?php echo $domain; ?>wp-json/wc/v3/reports <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">reports</span><span class="dl">"</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span> <span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">get</span><span class="p">(</span><span class="s1">'reports'</span><span class="p">));</span> <span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">get</span><span class="p">(</span><span class="s">"reports"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="s2">"reports"</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">[</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"sales"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"List of sales reports."</span><span class="p">,</span><span class="w">
        </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports/sales"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">]</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"top_sellers"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"List of top sellers products."</span><span class="p">,</span><span class="w">
        </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports/top_sellers"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">]</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"orders/totals"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Orders totals."</span><span class="p">,</span><span class="w">
        </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports/orders/totals"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">]</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"products/totals"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Products totals."</span><span class="p">,</span><span class="w">
        </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports/products/totals"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">]</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"customers/totals"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Customers totals."</span><span class="p">,</span><span class="w">
        </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports/customers/totals"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">]</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"coupons/totals"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Coupons totals."</span><span class="p">,</span><span class="w">
        </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports/coupons/totals"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">]</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"reviews/totals"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Reviews totals."</span><span class="p">,</span><span class="w">
        </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports/reviews/totals"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">]</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"categories/totals"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Categories totals."</span><span class="p">,</span><span class="w">
        </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports/categories/totals"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">]</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"tags/totals"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tags totals."</span><span class="p">,</span><span class="w">
        </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports/tags/totals"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">]</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"attributes/totals"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Attributes totals."</span><span class="p">,</span><span class="w">
        </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
            </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports/attributes/totals"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">],</span><span class="w">
            </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
                </span><span class="p">{</span><span class="w">
                    </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports"</span><span class="w">
                </span><span class="p">}</span><span class="w">
            </span><span class="p">]</span><span class="w">
        </span><span class="p">}</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">]</span><span class="w">
</span></code></pre></div><h2 id="retrieve-sales-report">Retrieve sales report</h2>
<p>This API lets you retrieve and view a sales report.</p>
<h3 id="http-request-2">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-get">GET</i>
        <h6>/wp-json/wc/v3/reports/sales</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <?php echo $domain; ?>wp-json/wc/v3/reports/sales?date_min<span class="o">=</span>2016-05-03&amp;date_max<span class="o">=</span>2016-05-04 <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">reports/sales</span><span class="dl">"</span><span class="p">,</span> <span class="p">{</span>
  <span class="na">date_min</span><span class="p">:</span> <span class="dl">"</span><span class="s2">2016-05-03</span><span class="dl">"</span><span class="p">,</span>
  <span class="na">date_max</span><span class="p">:</span> <span class="dl">"</span><span class="s2">2016-05-04</span><span class="dl">"</span>
<span class="p">})</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span>
<span class="nv">$query</span> <span class="o">=</span> <span class="p">[</span>
    <span class="s1">'date_min'</span> <span class="o">=&gt;</span> <span class="s1">'2016-05-03'</span><span class="p">,</span> 
    <span class="s1">'date_max'</span> <span class="o">=&gt;</span> <span class="s1">'2016-05-04'</span>
<span class="p">];</span>

<span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">get</span><span class="p">(</span><span class="s1">'reports/sales'</span><span class="p">,</span> <span class="nv">$query</span><span class="p">));</span>
<span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">get</span><span class="p">(</span><span class="s">"reports/sales?date_min=2016-05-03&amp;date_max=2016-05-04"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">query</span> <span class="o">=</span> <span class="p">{</span>
  <span class="ss">date_min: </span><span class="s2">"2016-05-03"</span><span class="p">,</span>
  <span class="ss">date_max: </span><span class="s2">"2016-05-04"</span>
<span class="p">}</span>

<span class="n">woocommerce</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="s2">"reports/sales"</span><span class="p">,</span> <span class="n">query</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">[</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"total_sales"</span><span class="p">:</span><span class="w"> </span><span class="s2">"14.00"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"net_sales"</span><span class="p">:</span><span class="w"> </span><span class="s2">"4.00"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"average_sales"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2.00"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"total_orders"</span><span class="p">:</span><span class="w"> </span><span class="mi">3</span><span class="p">,</span><span class="w">
    </span><span class="nl">"total_items"</span><span class="p">:</span><span class="w"> </span><span class="mi">6</span><span class="p">,</span><span class="w">
    </span><span class="nl">"total_tax"</span><span class="p">:</span><span class="w"> </span><span class="s2">"0.00"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"total_shipping"</span><span class="p">:</span><span class="w"> </span><span class="s2">"10.00"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"total_refunds"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
    </span><span class="nl">"total_discount"</span><span class="p">:</span><span class="w"> </span><span class="s2">"0.00"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"totals_grouped_by"</span><span class="p">:</span><span class="w"> </span><span class="s2">"day"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"totals"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"2016-05-03"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"sales"</span><span class="p">:</span><span class="w"> </span><span class="s2">"14.00"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"orders"</span><span class="p">:</span><span class="w"> </span><span class="mi">3</span><span class="p">,</span><span class="w">
        </span><span class="nl">"items"</span><span class="p">:</span><span class="w"> </span><span class="mi">6</span><span class="p">,</span><span class="w">
        </span><span class="nl">"tax"</span><span class="p">:</span><span class="w"> </span><span class="s2">"0.00"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="s2">"10.00"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"discount"</span><span class="p">:</span><span class="w"> </span><span class="s2">"0.00"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"customers"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
      </span><span class="p">},</span><span class="w">
      </span><span class="nl">"2016-05-04"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"sales"</span><span class="p">:</span><span class="w"> </span><span class="s2">"0.00"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"orders"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="nl">"items"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
        </span><span class="nl">"tax"</span><span class="p">:</span><span class="w"> </span><span class="s2">"0.00"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="s2">"0.00"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"discount"</span><span class="p">:</span><span class="w"> </span><span class="s2">"0.00"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"customers"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="nl">"total_customers"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"about"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">]</span><span class="w">
</span></code></pre></div><h4 id="sales-report-properties">Sales report properties</h4>
<table><thead>
<tr>
<th>Attribute</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code>total_sales</code></td>
<td>string</td>
<td>Gross sales in the period. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>net_sales</code></td>
<td>string</td>
<td>Net sales in the period. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>average_sales</code></td>
<td>string</td>
<td>Average net daily sales. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>total_orders</code></td>
<td>integer</td>
<td>Total of orders placed. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>total_items</code></td>
<td>integer</td>
<td>Total of items purchased. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>total_tax</code></td>
<td>string</td>
<td>Total charged for taxes. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>total_shipping</code></td>
<td>string</td>
<td>Total charged for shipping. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>total_refunds</code></td>
<td>integer</td>
<td>Total of refunded orders. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>total_discount</code></td>
<td>integer</td>
<td>Total of coupons used. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>totals_grouped_by</code></td>
<td>string</td>
<td>Group type. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>totals</code></td>
<td>array</td>
<td>Totals. <i class="label label-info">read-only</i></td>
</tr>
</tbody></table>
<h4 id="available-parameters">Available parameters</h4>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code>context</code></td>
<td>string</td>
<td>Scope under which the request is made; determines fields present in response. Default is <code>view</code>. Options: <code>view</code>.</td>
</tr>
<tr>
<td><code>period</code></td>
<td>string</td>
<td>Report period. Default is today's date. Options: <code>week</code>, <code>month</code>, <code>last_month</code> and <code>year</code></td>
</tr>
<tr>
<td><code>date_min</code></td>
<td>string</td>
<td>Return sales for a specific start date, the date need to be in the YYYY-MM-DD format.</td>
</tr>
<tr>
<td><code>date_max</code></td>
<td>string</td>
<td>Return sales for a specific end date, the date need to be in the YYYY-MM-DD format.</td>
</tr>
</tbody></table>
<h2 id="retrieve-top-sellers-report">Retrieve top sellers report</h2>
<p>This API lets you retrieve and view a list of top sellers report.</p>
<h3 id="http-request-3">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-get">GET</i>
        <h6>/wp-json/wc/v3/reports/top_sellers</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <?php echo $domain; ?>wp-json/wc/v3/reports/top_sellers?period<span class="o">=</span>last_month <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">reports/top_sellers</span><span class="dl">"</span><span class="p">,</span> <span class="p">{</span>
  <span class="na">period</span><span class="p">:</span> <span class="dl">"</span><span class="s2">last_month</span><span class="dl">"</span>
<span class="p">})</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span>
<span class="nv">$query</span> <span class="o">=</span> <span class="p">[</span>
    <span class="s1">'period'</span> <span class="o">=&gt;</span> <span class="s1">'last_month'</span>
<span class="p">];</span>

<span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">get</span><span class="p">(</span><span class="s1">'reports/top_sellers'</span><span class="p">,</span> <span class="nv">$query</span><span class="p">));</span>
<span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">get</span><span class="p">(</span><span class="s">"reports/top_sellers?period=last_month"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">query</span> <span class="o">=</span> <span class="p">{</span>
  <span class="ss">period: </span><span class="s2">"last_month"</span>
<span class="p">}</span>

<span class="n">woocommerce</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="s2">"reports/top_sellers"</span><span class="p">,</span> <span class="n">query</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">[</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Happy Ninja"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"product_id"</span><span class="p">:</span><span class="w"> </span><span class="mi">37</span><span class="p">,</span><span class="w">
    </span><span class="nl">"quantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"about"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"product"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/37"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"title"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Woo Album #4"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"product_id"</span><span class="p">:</span><span class="w"> </span><span class="mi">96</span><span class="p">,</span><span class="w">
    </span><span class="nl">"quantity"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"about"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/reports"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"product"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/products/96"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">]</span><span class="w">
</span></code></pre></div><h4 id="top-sellers-report-properties">Top sellers report properties</h4>
<table><thead>
<tr>
<th>Attribute</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code>title</code></td>
<td>string</td>
<td>Product title. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>product_id</code></td>
<td>integer</td>
<td>Product ID. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>quantity</code></td>
<td>integer</td>
<td>Total number of purchases. <i class="label label-info">read-only</i></td>
</tr>
</tbody></table>
<h4 id="available-parameters-2">Available parameters</h4>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code>context</code></td>
<td>string</td>
<td>Scope under which the request is made; determines fields present in response. Default is <code>view</code>. Options: <code>view</code>.</td>
</tr>
<tr>
<td><code>period</code></td>
<td>string</td>
<td>Report period. Default is <code>week</code>. Options: <code>week</code>, <code>month</code>, <code>last_month</code> and <code>year</code></td>
</tr>
<tr>
<td><code>date_min</code></td>
<td>string</td>
<td>Return sales for a specific start date, the date need to be in the YYYY-MM-DD format.</td>
</tr>
<tr>
<td><code>date_max</code></td>
<td>string</td>
<td>Return sales for a specific end date, the date need to be in the YYYY-MM-DD format.</td>
</tr>
</tbody></table>
<h2 id="retrieve-coupons-totals">Retrieve coupons totals</h2>
<p>This API lets you retrieve and view coupons totals report.</p>
<h3 id="http-request-4">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-get">GET</i>
        <h6>/wp-json/wc/v3/reports/coupons/totals</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <?php echo $domain; ?>wp-json/wc/v3/reports/coupons/totals <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">reports/coupons/totals</span><span class="dl">"</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span>
<span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">get</span><span class="p">(</span><span class="s1">'reports/coupons/totals'</span><span class="p">));</span>
<span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">get</span><span class="p">(</span><span class="s">"reports/coupons/totals"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="s2">"reports/coupons/totals"</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">[</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"percent"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Percentage discount"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">2</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"fixed_cart"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Fixed cart discount"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"fixed_product"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Fixed product discount"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">]</span><span class="w">
</span></code></pre></div><h4 id="coupons-totals-properties">Coupons totals properties</h4>
<table><thead>
<tr>
<th>Attribute</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code>slug</code></td>
<td>string</td>
<td>An alphanumeric identifier for the resource. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>name</code></td>
<td>string</td>
<td>Coupon type name. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>total</code></td>
<td>string</td>
<td>Amount of coupons. <i class="label label-info">read-only</i></td>
</tr>
</tbody></table>
<h2 id="retrieve-customers-totals">Retrieve customers totals</h2>
<p>This API lets you retrieve and view customers totals report.</p>
<h3 id="http-request-5">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-get">GET</i>
        <h6>/wp-json/wc/v3/reports/customers/totals</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <?php echo $domain; ?>wp-json/wc/v3/reports/customers/totals <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">reports/customers/totals</span><span class="dl">"</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span>
<span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">get</span><span class="p">(</span><span class="s1">'reports/customers/totals'</span><span class="p">));</span>
<span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">get</span><span class="p">(</span><span class="s">"reports/customers/totals"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="s2">"reports/customers/totals"</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">[</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"paying"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Paying customer"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">2</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"non_paying"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Non-paying customer"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">]</span><span class="w">
</span></code></pre></div><h4 id="customers-totals-properties">Customers totals properties</h4>
<table><thead>
<tr>
<th>Attribute</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code>slug</code></td>
<td>string</td>
<td>An alphanumeric identifier for the resource. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>name</code></td>
<td>string</td>
<td>Customer type name. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>total</code></td>
<td>string</td>
<td>Amount of customers. <i class="label label-info">read-only</i></td>
</tr>
</tbody></table>
<h2 id="retrieve-orders-totals">Retrieve orders totals</h2>
<p>This API lets you retrieve and view orders totals report.</p>
<h3 id="http-request-6">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-get">GET</i>
        <h6>/wp-json/wc/v3/reports/orders/totals</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <?php echo $domain; ?>wp-json/wc/v3/reports/orders/totals <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">reports/orders/totals</span><span class="dl">"</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span>
<span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">get</span><span class="p">(</span><span class="s1">'reports/orders/totals'</span><span class="p">));</span>
<span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">get</span><span class="p">(</span><span class="s">"reports/orders/totals"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="s2">"reports/orders/totals"</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">[</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"pending"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Pending payment"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">7</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"processing"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Processing"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">2</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"on-hold"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"On hold"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"completed"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Completed"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">3</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"cancelled"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cancelled"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"refunded"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Refunded"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"failed"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Failed"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">]</span><span class="w">
</span></code></pre></div><h4 id="orders-totals-properties">Orders totals properties</h4>
<table><thead>
<tr>
<th>Attribute</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code>slug</code></td>
<td>string</td>
<td>An alphanumeric identifier for the resource. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>name</code></td>
<td>string</td>
<td>Orders status name. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>total</code></td>
<td>string</td>
<td>Amount of orders. <i class="label label-info">read-only</i></td>
</tr>
</tbody></table>
<h2 id="retrieve-products-totals">Retrieve products totals</h2>
<p>This API lets you retrieve and view products totals report.</p>
<h3 id="http-request-7">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-get">GET</i>
        <h6>/wp-json/wc/v3/reports/products/totals</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <?php echo $domain; ?>wp-json/wc/v3/reports/products/totals <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">reports/products/totals</span><span class="dl">"</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span>
<span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">get</span><span class="p">(</span><span class="s1">'reports/products/totals'</span><span class="p">));</span>
<span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">get</span><span class="p">(</span><span class="s">"reports/products/totals"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="s2">"reports/products/totals"</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">[</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"external"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"External/Affiliate product"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"grouped"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Grouped product"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"simple"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Simple product"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">21</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"variable"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Variable product"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">3</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">]</span><span class="w">
</span></code></pre></div><h4 id="products-totals-properties">Products totals properties</h4>
<table><thead>
<tr>
<th>Attribute</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code>slug</code></td>
<td>string</td>
<td>An alphanumeric identifier for the resource. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>name</code></td>
<td>string</td>
<td>Product type name. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>total</code></td>
<td>string</td>
<td>Amount of products. <i class="label label-info">read-only</i></td>
</tr>
</tbody></table>
<h2 id="retrieve-reviews-totals">Retrieve reviews totals</h2>
<p>This API lets you retrieve and view reviews totals report.</p>
<h3 id="http-request-8">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-get">GET</i>
        <h6>/wp-json/wc/v3/reports/reviews/totals</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <?php echo $domain; ?>wp-json/wc/v3/reports/reviews/totals <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">reports/reviews/totals</span><span class="dl">"</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span>
<span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">get</span><span class="p">(</span><span class="s1">'reports/reviews/totals'</span><span class="p">));</span>
<span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">get</span><span class="p">(</span><span class="s">"reports/reviews/totals"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="s2">"reports/reviews/totals"</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">[</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"rated_1_out_of_5"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Rated 1 out of 5"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"rated_2_out_of_5"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Rated 2 out of 5"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"rated_3_out_of_5"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Rated 3 out of 5"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">3</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"rated_4_out_of_5"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Rated 4 out of 5"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
        </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"rated_5_out_of_5"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Rated 5 out of 5"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"total"</span><span class="p">:</span><span class="w"> </span><span class="mi">4</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">]</span><span class="w">
</span></code></pre></div><h4 id="reviews-totals-properties">Reviews totals properties</h4>
<table><thead>
<tr>
<th>Attribute</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code>slug</code></td>
<td>string</td>
<td>An alphanumeric identifier for the resource. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>name</code></td>
<td>string</td>
<td>Review type name. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>total</code></td>
<td>string</td>
<td>Amount of reviews. <i class="label label-info">read-only</i></td>
</tr>
</tbody></table>
<h1 id="tax-rates">Tax rates</h1>
<p>The taxes API allows you to create, view, update, and delete individual tax rates, or a batch of tax rates.</p>
<h2 id="tax-rate-properties">Tax rate properties</h2>
<table><thead>
<tr>
<th>Attribute</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code>id</code></td>
<td>integer</td>
<td>Unique identifier for the resource. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>country</code></td>
<td>string</td>
<td>Country ISO 3166 code. See <a href="http://www.chemie.fu-berlin.de/diverse/doc/ISO_3166.html">ISO 3166 Codes (Countries)</a> for more details</td>
</tr>
<tr>
<td><code>state</code></td>
<td>string</td>
<td>State code.</td>
</tr>
<tr>
<td><code>postcode</code></td>
<td>string</td>
<td>Postcode/ZIP, it doesn't support multiple values. Deprecated as of WooCommerce 5.3, <code>postcodes</code> should be used instead.</td>
</tr>
<tr>
<td><code>city</code></td>
<td>string</td>
<td>City name, it doesn't support multiple values. Deprecated as of WooCommerce 5.3, <code>postcodes</code> should be used instead.</td>
</tr>
<tr>
<td><code>postcodes</code></td>
<td>string[]</td>
<td>Postcodes/ZIPs. Introduced in WooCommerce 5.3.</td>
</tr>
<tr>
<td><code>cities</code></td>
<td>string[]</td>
<td>City names. Introduced in WooCommerce 5.3.</td>
</tr>
<tr>
<td><code>rate</code></td>
<td>string</td>
<td>Tax rate.</td>
</tr>
<tr>
<td><code>name</code></td>
<td>string</td>
<td>Tax rate name.</td>
</tr>
<tr>
<td><code>priority</code></td>
<td>integer</td>
<td>Tax priority. Only 1 matching rate per priority will be used. To define multiple tax rates for a single area you need to specify a different priority per rate. Default is <code>1</code>.</td>
</tr>
<tr>
<td><code>compound</code></td>
<td>boolean</td>
<td>Whether or not this is a compound rate. Compound tax rates are applied on top of other tax rates. Default is <code>false</code>.</td>
</tr>
<tr>
<td><code>shipping</code></td>
<td>boolean</td>
<td>Whether or not this tax rate also gets applied to shipping. Default is <code>true</code>.</td>
</tr>
<tr>
<td><code>order</code></td>
<td>integer</td>
<td>Indicates the order that will appear in queries.</td>
</tr>
<tr>
<td><code>class</code></td>
<td>string</td>
<td>Tax class. Default is <code>standard</code>.</td>
</tr>
</tbody></table>
<h2 id="create-a-tax-rate">Create a tax rate</h2>
<p>This API helps you to create a new tax rate.</p>
<h3 id="http-request">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-post">POST</i>
        <h6>/wp-json/wc/v3/taxes</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <span class="nt">-X</span> POST <?php echo $domain; ?>wp-json/wc/v3/taxes <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret <span class="se">\</span>
    <span class="nt">-H</span> <span class="s2">"Content-Type: application/json"</span> <span class="se">\</span>
    <span class="nt">-d</span> <span class="s1">'{
  "country": "US",
  "state": "AL",
  "cities": ["Alpine", "Brookside", "Cardiff"],
  "postcodes": ["35014", "35036", "35041"],
  "rate": "4",
  "name": "State Tax",
  "shipping": false
}'</span>
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="kd">const</span> <span class="nx">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
  <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">AL</span><span class="dl">"</span><span class="p">,</span>
  <span class="na">cities</span><span class="p">:</span> <span class="p">[</span><span class="dl">"</span><span class="s2">Alpine</span><span class="dl">"</span><span class="p">,</span> <span class="dl">"</span><span class="s2">Brookside</span><span class="dl">"</span><span class="p">,</span> <span class="dl">"</span><span class="s2">Cardiff</span><span class="dl">"</span><span class="p">],</span>
  <span class="na">postcodes</span><span class="p">:</span> <span class="p">[</span><span class="dl">"</span><span class="s2">35014</span><span class="dl">"</span><span class="p">,</span> <span class="dl">"</span><span class="s2">35036</span><span class="dl">"</span><span class="p">,</span> <span class="dl">"</span><span class="s2">35041</span><span class="dl">"</span><span class="p">],</span>
  <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">4</span><span class="dl">"</span><span class="p">,</span>
  <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
  <span class="na">shipping</span><span class="p">:</span> <span class="kc">false</span>
<span class="p">};</span>

<span class="nx">WooCommerce</span><span class="p">.</span><span class="nx">post</span><span class="p">(</span><span class="dl">"</span><span class="s2">taxes</span><span class="dl">"</span><span class="p">,</span> <span class="nx">data</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span>
<span class="nv">$data</span> <span class="o">=</span> <span class="p">[</span>
    <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
    <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'AL'</span><span class="p">,</span>
    <span class="s1">'cities'</span> <span class="o">=&gt;</span> <span class="p">[</span><span class="s1">'Alpine'</span><span class="p">,</span> <span class="s1">'Brookside'</span><span class="p">,</span> <span class="s1">'Cardiff'</span><span class="p">],</span>
    <span class="s1">'postcodes'</span> <span class="o">=&gt;</span> <span class="p">[</span><span class="s1">'35014'</span><span class="p">,</span> <span class="s1">'35036'</span><span class="p">,</span> <span class="s1">'35041'</span><span class="p">],</span>
    <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'4'</span><span class="p">,</span>
    <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
    <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">false</span>
<span class="p">];</span>

<span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">post</span><span class="p">(</span><span class="s1">'taxes'</span><span class="p">,</span> <span class="nv">$data</span><span class="p">));</span>
<span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
    <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
    <span class="s">"state"</span><span class="p">:</span> <span class="s">"AL"</span><span class="p">,</span>
    <span class="s">"cities"</span><span class="p">:</span> <span class="p">[</span><span class="s">"Alpine"</span><span class="p">,</span> <span class="s">"Brookside"</span><span class="p">,</span> <span class="s">"Cardiff"</span><span class="p">],</span>
    <span class="s">"postcodes"</span><span class="p">:</span> <span class="p">[</span><span class="s">"35014"</span><span class="p">,</span> <span class="s">"35036"</span><span class="p">,</span> <span class="s">"35041"</span><span class="p">],</span>
    <span class="s">"rate"</span><span class="p">:</span> <span class="s">"4"</span><span class="p">,</span>
    <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
    <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">False</span>
<span class="p">}</span>

<span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">post</span><span class="p">(</span><span class="s">"taxes"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
  <span class="ss">state: </span><span class="s2">"AL"</span><span class="p">,</span>
  <span class="ss">cities: </span><span class="p">[</span><span class="s2">"Alpine"</span><span class="p">,</span> <span class="s2">"Brookside"</span><span class="p">,</span> <span class="s2">"Cardiff"</span><span class="p">],</span>
  <span class="ss">postcodes: </span><span class="p">[</span><span class="s2">"35014"</span><span class="p">,</span> <span class="s2">"35036"</span><span class="p">,</span> <span class="s2">"35041"</span><span class="p">],</span>
  <span class="ss">rate: </span><span class="s2">"4"</span><span class="p">,</span>
  <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
  <span class="ss">shipping: </span><span class="kp">false</span>
<span class="p">}</span>

<span class="n">woocommerce</span><span class="p">.</span><span class="nf">post</span><span class="p">(</span><span class="s2">"taxes"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">72</span><span class="p">,</span><span class="w">
  </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"AL"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">"35041"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cardiff"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
    </span><span class="s2">"35014"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"35036"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"35041"</span><span class="w">
  </span><span class="p">],</span><span class="w">
  </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
    </span><span class="s2">"Alpine"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"Brookside"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"Cardiff"</span><span class="w">
  </span><span class="p">],</span><span class="w">
  </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"4.0000"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
  </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
  </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
  </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
  </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
    </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/72"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre></div><h2 id="retrieve-a-tax-rate">Retrieve a tax rate</h2>
<p>This API lets you retrieve and view a specific tax rate by ID.</p>

<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-get">GET</i>
        <h6>/wp-json/wc/v3/taxes/&lt;id&gt;</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <?php echo $domain; ?>wp-json/wc/v3/taxes/72 <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">taxes/72</span><span class="dl">"</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span> <span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">get</span><span class="p">(</span><span class="s1">'taxes/72'</span><span class="p">));</span> <span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">get</span><span class="p">(</span><span class="s">"taxes/72"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="s2">"taxes/72"</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">72</span><span class="p">,</span><span class="w">
  </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"AL"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">"35041"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cardiff"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
    </span><span class="s2">"35014"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"35036"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"35041"</span><span class="w">
  </span><span class="p">],</span><span class="w">
  </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
    </span><span class="s2">"Alpine"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"Brookside"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"Cardiff"</span><span class="w">
  </span><span class="p">],</span><span class="w">
  </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"4.0000"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
  </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
  </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
  </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
  </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
    </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/72"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre></div><h2 id="list-all-tax-rates">List all tax rates</h2>
<p>This API helps you to view all the tax rates.</p>
<h3 id="http-request-2">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-get">GET</i>
        <h6>/wp-json/wc/v3/taxes</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <?php echo $domain; ?>wp-json/wc/v3/taxes <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">taxes</span><span class="dl">"</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span> <span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">get</span><span class="p">(</span><span class="s1">'taxes'</span><span class="p">));</span> <span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">get</span><span class="p">(</span><span class="s">"taxes"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="s2">"taxes"</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">[</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">72</span><span class="p">,</span><span class="w">
    </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"AL"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">"35041"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cardiff"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="s2">"35014"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"35036"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"35041"</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="s2">"Alpine"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"Brookside"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"Cardiff"</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"4.0000"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
    </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
    </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
    </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
    </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/72"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">73</span><span class="p">,</span><span class="w">
    </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"AZ"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5.6000"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
    </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
    </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
    </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">2</span><span class="p">,</span><span class="w">
    </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/73"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">74</span><span class="p">,</span><span class="w">
    </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"AR"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.5000"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
    </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
    </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
    </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">3</span><span class="p">,</span><span class="w">
    </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/74"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">75</span><span class="p">,</span><span class="w">
    </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"CA"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"7.5000"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
    </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
    </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
    </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">4</span><span class="p">,</span><span class="w">
    </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/75"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">76</span><span class="p">,</span><span class="w">
    </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"CO"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2.9000"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
    </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
    </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
    </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">5</span><span class="p">,</span><span class="w">
    </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/76"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">77</span><span class="p">,</span><span class="w">
    </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"CT"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.3500"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
    </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
    </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
    </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">6</span><span class="p">,</span><span class="w">
    </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/77"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">78</span><span class="p">,</span><span class="w">
    </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"DC"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5.7500"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
    </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
    </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
    </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">7</span><span class="p">,</span><span class="w">
    </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/78"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">79</span><span class="p">,</span><span class="w">
    </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"FL"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.0000"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
    </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
    </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
    </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">8</span><span class="p">,</span><span class="w">
    </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/79"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">80</span><span class="p">,</span><span class="w">
    </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"GA"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"4.0000"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
    </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
    </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
    </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">9</span><span class="p">,</span><span class="w">
    </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/80"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">81</span><span class="p">,</span><span class="w">
    </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"GU"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"4.0000"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
    </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
    </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
    </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">10</span><span class="p">,</span><span class="w">
    </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/81"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">]</span><span class="w">
</span></code></pre></div><h4 id="available-parameters">Available parameters</h4>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code>context</code></td>
<td>string</td>
<td>Scope under which the request is made; determines fields present in response. Options: <code>view</code> and <code>edit</code>.</td>
</tr>
<tr>
<td><code>page</code></td>
<td>integer</td>
<td>Current page of the collection.</td>
</tr>
<tr>
<td><code>per_page</code></td>
<td>integer</td>
<td>Maximum number of items to be returned in result set.</td>
</tr>
<tr>
<td><code>offset</code></td>
<td>integer</td>
<td>Offset the result set by a specific number of items.</td>
</tr>
<tr>
<td><code>order</code></td>
<td>string</td>
<td>Order sort attribute ascending or descending. Default is <code>asc</code>. Options: <code>asc</code> and <code>desc</code>.</td>
</tr>
<tr>
<td><code>orderby</code></td>
<td>string</td>
<td>Sort collection by object attribute. Default is <code>order</code>. Options: <code>id</code>, <code>order</code> and <code>priority</code>.</td>
</tr>
<tr>
<td><code>class</code></td>
<td>string</td>
<td>Retrieve only tax rates of this Tax class.</td>
</tr>
</tbody></table>
<h2 id="update-a-tax-rate">Update a tax rate</h2>
<p>This API lets you make changes to a tax rate.</p>
<h3 id="http-request-3">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-put">PUT</i>
        <h6>/wp-json/wc/v3/taxes/&lt;id&gt;</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <span class="nt">-X</span> PUT <?php echo $domain; ?>wp-json/wc/v3/taxes/72 <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret <span class="se">\</span>
    <span class="nt">-H</span> <span class="s2">"Content-Type: application/json"</span> <span class="se">\</span>
    <span class="nt">-d</span> <span class="s1">'{
  "name": "US Tax"
}'</span>
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="kd">const</span> <span class="nx">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US Tax</span><span class="dl">"</span>
<span class="p">};</span>

<span class="nx">WooCommerce</span><span class="p">.</span><span class="nx">put</span><span class="p">(</span><span class="dl">"</span><span class="s2">taxes/72</span><span class="dl">"</span><span class="p">,</span> <span class="nx">data</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span>
<span class="nv">$data</span> <span class="o">=</span> <span class="p">[</span>
    <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'US Tax'</span>
<span class="p">];</span>

<span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">put</span><span class="p">(</span><span class="s1">'taxes/72'</span><span class="p">,</span> <span class="nv">$data</span><span class="p">));</span>
<span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
    <span class="s">"name"</span><span class="p">:</span> <span class="s">"US Tax"</span>
<span class="p">}</span>

<span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">put</span><span class="p">(</span><span class="s">"taxes/72"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="ss">name: </span><span class="s2">"US Tax"</span>
<span class="p">}</span>

<span class="n">woocommerce</span><span class="p">.</span><span class="nf">put</span><span class="p">(</span><span class="s2">"taxes/72"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">72</span><span class="p">,</span><span class="w">
  </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"AL"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">"35041"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cardiff"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
    </span><span class="s2">"35014"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"35036"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"35041"</span><span class="w">
  </span><span class="p">],</span><span class="w">
  </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
    </span><span class="s2">"Alpine"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"Brookside"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"Cardiff"</span><span class="w">
  </span><span class="p">],</span><span class="w">
  </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"4.0000"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US Tax"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
  </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
  </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
  </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
  </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
    </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/72"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre></div><h2 id="delete-a-tax-rate">Delete a tax rate</h2>
<p>This API helps you delete a tax rate.</p>
<h3 id="http-request-4">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-delete">DELETE</i>
        <h6>/wp-json/wc/v3/taxes/&lt;id&gt;</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <span class="nt">-X</span> DELETE <?php echo $domain; ?>wp-json/wc/v3/taxes/72?force<span class="o">=</span><span class="nb">true</span> <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="k">delete</span><span class="p">(</span><span class="dl">"</span><span class="s2">taxes/72</span><span class="dl">"</span><span class="p">,</span> <span class="p">{</span>
  <span class="na">force</span><span class="p">:</span> <span class="kc">true</span>
<span class="p">})</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span> <span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nb">delete</span><span class="p">(</span><span class="s1">'taxes/72'</span><span class="p">,</span> <span class="p">[</span><span class="s1">'force'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">]));</span> <span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">delete</span><span class="p">(</span><span class="s">"taxes/72"</span><span class="p">,</span> <span class="n">params</span><span class="o">=</span><span class="p">{</span><span class="s">"force"</span><span class="p">:</span> <span class="bp">True</span><span class="p">}).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">delete</span><span class="p">(</span><span class="s2">"taxes/72"</span><span class="p">,</span> <span class="ss">force: </span><span class="kp">true</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">72</span><span class="p">,</span><span class="w">
  </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"AL"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">"35041"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cardiff"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
    </span><span class="s2">"35014"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"35036"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"35041"</span><span class="w">
  </span><span class="p">],</span><span class="w">
  </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
    </span><span class="s2">"Alpine"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"Brookside"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"Cardiff"</span><span class="w">
  </span><span class="p">],</span><span class="w">
  </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"4.0000"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US Tax"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
  </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
  </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
  </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
  </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
    </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/72"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre></div><h4 id="available-parameters-2">Available parameters</h4>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code>force</code></td>
<td>string</td>
<td>Required to be <code>true</code>, as resource does not support trashing.</td>
</tr>
</tbody></table>
<h2 id="batch-update-tax-rates">Batch update tax rates</h2>
<p>This API helps you to batch create, update and delete multiple tax rates.</p>

<aside class="notice">
Note: By default it's limited to up to 100 objects to be created, updated or deleted. 
</aside>
<h3 id="http-request-5">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-post">POST</i>
        <h6>/wp-json/wc/v3/taxes/batch</h6>
    </div>
</div>

<blockquote>
<p>Example batch creating all US taxes:</p>
</blockquote>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <span class="nt">-X</span> POST <?php echo $domain; ?>wp-json/wc/v3/taxes/batch <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret <span class="se">\</span>
    <span class="nt">-H</span> <span class="s2">"Content-Type: application/json"</span> <span class="se">\</span>
    <span class="nt">-d</span> <span class="s1">'{
  "create": [
    {
      "country": "US",
      "state": "AL",
      "rate": "4.0000",
      "name": "State Tax",
      "shipping": false,
      "order": 1
    },
    {
      "country": "US",
      "state": "AZ",
      "rate": "5.6000",
      "name": "State Tax",
      "shipping": false,
      "order": 2
    },
    {
      "country": "US",
      "state": "AR",
      "rate": "6.5000",
      "name": "State Tax",
      "shipping": true,
      "order": 3
    },
    {
      "country": "US",
      "state": "CA",
      "rate": "7.5000",
      "name": "State Tax",
      "shipping": false,
      "order": 4
    },
    {
      "country": "US",
      "state": "CO",
      "rate": "2.9000",
      "name": "State Tax",
      "shipping": false,
      "order": 5
    },
    {
      "country": "US",
      "state": "CT",
      "rate": "6.3500",
      "name": "State Tax",
      "shipping": true,
      "order": 6
    },
    {
      "country": "US",
      "state": "DC",
      "rate": "5.7500",
      "name": "State Tax",
      "shipping": true,
      "order": 7
    },
    {
      "country": "US",
      "state": "FL",
      "rate": "6.0000",
      "name": "State Tax",
      "shipping": true,
      "order": 8
    },
    {
      "country": "US",
      "state": "GA",
      "rate": "4.0000",
      "name": "State Tax",
      "shipping": true,
      "order": 9
    },
    {
      "country": "US",
      "state": "GU",
      "rate": "4.0000",
      "name": "State Tax",
      "shipping": false,
      "order": 10
    },
    {
      "country": "US",
      "state": "HI",
      "rate": "4.0000",
      "name": "State Tax",
      "shipping": true,
      "order": 11
    },
    {
      "country": "US",
      "state": "ID",
      "rate": "6.0000",
      "name": "State Tax",
      "shipping": false,
      "order": 12
    },
    {
      "country": "US",
      "state": "IL",
      "rate": "6.2500",
      "name": "State Tax",
      "shipping": false,
      "order": 13
    },
    {
      "country": "US",
      "state": "IN",
      "rate": "7.0000",
      "name": "State Tax",
      "shipping": false,
      "order": 14
    },
    {
      "country": "US",
      "state": "IA",
      "rate": "6.0000",
      "name": "State Tax",
      "shipping": false,
      "order": 15
    },
    {
      "country": "US",
      "state": "KS",
      "rate": "6.1500",
      "name": "State Tax",
      "shipping": true,
      "order": 16
    },
    {
      "country": "US",
      "state": "KY",
      "rate": "6.0000",
      "name": "State Tax",
      "shipping": true,
      "order": 17
    },
    {
      "country": "US",
      "state": "LA",
      "rate": "4.0000",
      "name": "State Tax",
      "shipping": false,
      "order": 18
    },
    {
      "country": "US",
      "state": "ME",
      "rate": "5.5000",
      "name": "State Tax",
      "shipping": false,
      "order": 19
    },
    {
      "country": "US",
      "state": "MD",
      "rate": "6.0000",
      "name": "State Tax",
      "shipping": false,
      "order": 20
    },
    {
      "country": "US",
      "state": "MA",
      "rate": "6.2500",
      "name": "State Tax",
      "shipping": false,
      "order": 21
    },
    {
      "country": "US",
      "state": "MI",
      "rate": "6.0000",
      "name": "State Tax",
      "shipping": true,
      "order": 22
    },
    {
      "country": "US",
      "state": "MN",
      "rate": "6.8750",
      "name": "State Tax",
      "shipping": true,
      "order": 23
    },
    {
      "country": "US",
      "state": "MS",
      "rate": "7.0000",
      "name": "State Tax",
      "shipping": true,
      "order": 24
    },
    {
      "country": "US",
      "state": "MO",
      "rate": "4.2250",
      "name": "State Tax",
      "shipping": false,
      "order": 25
    },
    {
      "country": "US",
      "state": "NE",
      "rate": "5.5000",
      "name": "State Tax",
      "shipping": true,
      "order": 26
    },
    {
      "country": "US",
      "state": "NV",
      "rate": "6.8500",
      "name": "State Tax",
      "shipping": false,
      "order": 27
    },
    {
      "country": "US",
      "state": "NJ",
      "rate": "7.0000",
      "name": "State Tax",
      "shipping": true,
      "order": 28
    },
    {
      "country": "US",
      "state": "NM",
      "rate": "5.1250",
      "name": "State Tax",
      "shipping": true,
      "order": 29
    },
    {
      "country": "US",
      "state": "NY",
      "rate": "4.0000",
      "name": "State Tax",
      "shipping": true,
      "order": 30
    },
    {
      "country": "US",
      "state": "NC",
      "rate": "4.7500",
      "name": "State Tax",
      "shipping": true,
      "order": 31
    },
    {
      "country": "US",
      "state": "ND",
      "rate": "5.0000",
      "name": "State Tax",
      "shipping": true,
      "order": 32
    },
    {
      "country": "US",
      "state": "OH",
      "rate": "5.7500",
      "name": "State Tax",
      "shipping": true,
      "order": 33
    },
    {
      "country": "US",
      "state": "OK",
      "rate": "4.5000",
      "name": "State Tax",
      "shipping": false,
      "order": 34
    },
    {
      "country": "US",
      "state": "PA",
      "rate": "6.0000",
      "name": "State Tax",
      "shipping": true,
      "order": 35
    },
    {
      "country": "US",
      "state": "PR",
      "rate": "6.0000",
      "name": "State Tax",
      "shipping": false,
      "order": 36
    },
    {
      "country": "US",
      "state": "RI",
      "rate": "7.0000",
      "name": "State Tax",
      "shipping": false,
      "order": 37
    },
    {
      "country": "US",
      "state": "SC",
      "rate": "6.0000",
      "name": "State Tax",
      "shipping": true,
      "order": 38
    },
    {
      "country": "US",
      "state": "SD",
      "rate": "4.0000",
      "name": "State Tax",
      "shipping": true,
      "order": 39
    },
    {
      "country": "US",
      "state": "TN",
      "rate": "7.0000",
      "name": "State Tax",
      "shipping": true,
      "order": 40
    },
    {
      "country": "US",
      "state": "TX",
      "rate": "6.2500",
      "name": "State Tax",
      "shipping": true,
      "order": 41
    },
    {
      "country": "US",
      "state": "UT",
      "rate": "5.9500",
      "name": "State Tax",
      "shipping": false,
      "order": 42
    },
    {
      "country": "US",
      "state": "VT",
      "rate": "6.0000",
      "name": "State Tax",
      "shipping": true,
      "order": 43
    },
    {
      "country": "US",
      "state": "VA",
      "rate": "5.3000",
      "name": "State Tax",
      "shipping": false,
      "order": 44
    },
    {
      "country": "US",
      "state": "WA",
      "rate": "6.5000",
      "name": "State Tax",
      "shipping": true,
      "order": 45
    },
    {
      "country": "US",
      "state": "WV",
      "rate": "6.0000",
      "name": "State Tax",
      "shipping": true,
      "order": 46
    },
    {
      "country": "US",
      "state": "WI",
      "rate": "5.0000",
      "name": "State Tax",
      "shipping": true,
      "order": 47
    },
    {
      "country": "US",
      "state": "WY",
      "rate": "4.0000",
      "name": "State Tax",
      "shipping": true,
      "order": 48
    }
  ]
}'</span>
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="kd">const</span> <span class="nx">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="na">create</span><span class="p">:</span> <span class="p">[</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">AL</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">4.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">1</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">AZ</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">5.6000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">2</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">AR</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">6.5000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">3</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">CA</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">7.5000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">4</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">CO</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">2.9000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">5</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">CT</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">6.3500</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">6</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">DC</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">5.7500</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">7</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">FL</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">6.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">8</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">GA</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">4.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">9</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">GU</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">4.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">10</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">HI</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">4.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">11</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">ID</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">6.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">12</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">IL</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">6.2500</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">13</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">IN</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">7.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">14</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">IA</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">6.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">15</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">KS</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">6.1500</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">16</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">KY</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">6.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">17</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">LA</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">4.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">18</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">ME</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">5.5000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">19</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">MD</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">6.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">20</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">MA</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">6.2500</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">21</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">MI</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">6.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">22</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">MN</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">6.8750</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">23</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">MS</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">7.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">24</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">MO</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">4.2250</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">25</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">NE</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">5.5000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">26</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">NV</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">6.8500</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">27</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">NJ</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">7.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">28</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">NM</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">5.1250</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">29</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">NY</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">4.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">30</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">NC</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">4.7500</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">31</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">ND</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">5.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">32</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">OH</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">5.7500</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">33</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">OK</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">4.5000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">34</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">PA</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">6.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">35</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">PR</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">6.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">36</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">RI</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">7.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">37</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">SC</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">6.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">38</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">SD</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">4.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">39</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">TN</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">7.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">40</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">TX</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">6.2500</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">41</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">UT</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">5.9500</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">42</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">VT</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">6.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">43</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">VA</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">5.3000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">false</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">44</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">WA</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">6.5000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">45</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">WV</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">6.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">46</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">WI</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">5.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">47</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">country</span><span class="p">:</span> <span class="dl">"</span><span class="s2">US</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">state</span><span class="p">:</span> <span class="dl">"</span><span class="s2">WY</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">rate</span><span class="p">:</span> <span class="dl">"</span><span class="s2">4.0000</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">State Tax</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">shipping</span><span class="p">:</span> <span class="kc">true</span><span class="p">,</span>
      <span class="na">order</span><span class="p">:</span> <span class="mi">48</span>
    <span class="p">}</span>
  <span class="p">]</span>
<span class="p">};</span>

<span class="nx">WooCommerce</span><span class="p">.</span><span class="nx">post</span><span class="p">(</span><span class="dl">"</span><span class="s2">taxes/batch</span><span class="dl">"</span><span class="p">,</span> <span class="nx">data</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span>
<span class="nv">$data</span> <span class="o">=</span> <span class="p">[</span>
    <span class="s1">'create'</span> <span class="o">=&gt;</span> <span class="p">[</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'AL'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'4.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">false</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">1</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'AZ'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'5.6000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">false</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">2</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'AR'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'6.5000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">3</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'CA'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'7.5000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">false</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">4</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'CO'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'2.9000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">false</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">5</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'CT'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'6.3500'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">6</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'DC'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'5.7500'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">7</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'FL'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'6.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">8</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'GA'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'4.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">9</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'GU'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'4.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">false</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">10</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'HI'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'4.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">11</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'ID'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'6.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">false</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">12</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'IL'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'6.2500'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">false</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">13</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'IN'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'7.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">false</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">14</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'IA'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'6.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">false</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">15</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'KS'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'6.1500'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">16</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'KY'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'6.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">17</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'LA'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'4.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">false</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">18</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'ME'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'5.5000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">false</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">19</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'MD'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'6.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">false</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">20</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'MA'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'6.2500'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">false</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">21</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'MI'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'6.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">22</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'MN'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'6.8750'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">23</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'MS'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'7.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">24</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'MO'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'4.2250'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">false</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">25</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'NE'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'5.5000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">26</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'NV'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'6.8500'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">false</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">27</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'NJ'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'7.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">28</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'NM'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'5.1250'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">29</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'NY'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'4.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">30</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'NC'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'4.7500'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">31</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'ND'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'5.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">32</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'OH'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'5.7500'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">33</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'OK'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'4.5000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">false</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">34</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'PA'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'6.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">35</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'PR'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'6.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">false</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">36</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'RI'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'7.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">false</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">37</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'SC'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'6.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">38</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'SD'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'4.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">39</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'TN'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'7.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">40</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'TX'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'6.2500'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">41</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'UT'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'5.9500'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">false</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">42</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'VT'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'6.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">43</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'VA'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'5.3000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">false</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">44</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'WA'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'6.5000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">45</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'WV'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'6.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">46</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'WI'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'5.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">47</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'country'</span> <span class="o">=&gt;</span> <span class="s1">'US'</span><span class="p">,</span>
            <span class="s1">'state'</span> <span class="o">=&gt;</span> <span class="s1">'WY'</span><span class="p">,</span>
            <span class="s1">'rate'</span> <span class="o">=&gt;</span> <span class="s1">'4.0000'</span><span class="p">,</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'State Tax'</span><span class="p">,</span>
            <span class="s1">'shipping'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">,</span>
            <span class="s1">'order'</span> <span class="o">=&gt;</span> <span class="mi">48</span>
        <span class="p">]</span>
    <span class="p">]</span>
<span class="p">];</span>

<span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">post</span><span class="p">(</span><span class="s1">'taxes/batch'</span><span class="p">,</span> <span class="nv">$data</span><span class="p">));</span>
<span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
    <span class="s">"create"</span><span class="p">:</span> <span class="p">[</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"AL"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"4.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">False</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">1</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"AZ"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"5.6000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">False</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">2</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"AR"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"6.5000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">3</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"CA"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"7.5000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">False</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">4</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"CO"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"2.9000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">False</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">5</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"CT"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"6.3500"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">6</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"DC"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"5.7500"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">7</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"FL"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"6.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">8</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"GA"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"4.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">9</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"GU"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"4.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">False</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">10</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"HI"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"4.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">11</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"ID"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"6.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">False</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">12</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"IL"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"6.2500"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">False</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">13</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"IN"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"7.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">False</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">14</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"IA"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"6.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">False</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">15</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"KS"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"6.1500"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">16</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"KY"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"6.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">17</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"LA"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"4.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">False</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">18</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"ME"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"5.5000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">False</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">19</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"MD"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"6.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">False</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">20</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"MA"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"6.2500"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">False</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">21</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"MI"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"6.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">22</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"MN"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"6.8750"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">23</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"MS"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"7.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">24</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"MO"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"4.2250"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">False</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">25</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"NE"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"5.5000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">26</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"NV"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"6.8500"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">False</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">27</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"NJ"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"7.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">28</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"NM"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"5.1250"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">29</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"NY"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"4.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">30</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"NC"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"4.7500"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">31</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"ND"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"5.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">32</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"OH"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"5.7500"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">33</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"OK"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"4.5000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">False</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">34</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"PA"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"6.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">35</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"PR"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"6.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">False</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">36</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"RI"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"7.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">False</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">37</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"SC"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"6.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">38</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"SD"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"4.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">39</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"TN"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"7.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">40</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"TX"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"6.2500"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">41</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"UT"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"5.9500"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">False</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">42</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"VT"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"6.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">43</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"VA"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"5.3000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">False</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">44</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"WA"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"6.5000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">45</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"WV"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"6.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">46</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"WI"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"5.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">47</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"country"</span><span class="p">:</span> <span class="s">"US"</span><span class="p">,</span>
            <span class="s">"state"</span><span class="p">:</span> <span class="s">"WY"</span><span class="p">,</span>
            <span class="s">"rate"</span><span class="p">:</span> <span class="s">"4.0000"</span><span class="p">,</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"State Tax"</span><span class="p">,</span>
            <span class="s">"shipping"</span><span class="p">:</span> <span class="bp">True</span><span class="p">,</span>
            <span class="s">"order"</span><span class="p">:</span> <span class="mi">48</span>
        <span class="p">}</span>
    <span class="p">]</span>
<span class="p">}</span>

<span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">post</span><span class="p">(</span><span class="s">"taxes/batch"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="ss">create: </span><span class="p">[</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"AL"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"4.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">false</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">1</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"AZ"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"5.6000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">false</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">2</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"AR"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"6.5000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">3</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"CA"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"7.5000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">false</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">4</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"CO"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"2.9000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">false</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">5</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"CT"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"6.3500"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">6</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"DC"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"5.7500"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">7</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"FL"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"6.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">8</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"GA"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"4.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">9</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"GU"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"4.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">false</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">10</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"HI"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"4.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">11</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"ID"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"6.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">false</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">12</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"IL"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"6.2500"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">false</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">13</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"IN"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"7.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">false</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">14</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"IA"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"6.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">false</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">15</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"KS"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"6.1500"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">16</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"KY"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"6.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">17</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"LA"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"4.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">false</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">18</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"ME"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"5.5000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">false</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">19</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"MD"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"6.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">false</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">20</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"MA"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"6.2500"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">false</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">21</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"MI"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"6.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">22</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"MN"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"6.8750"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">23</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"MS"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"7.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">24</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"MO"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"4.2250"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">false</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">25</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"NE"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"5.5000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">26</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"NV"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"6.8500"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">false</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">27</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"NJ"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"7.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">28</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"NM"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"5.1250"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">29</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"NY"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"4.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">30</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"NC"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"4.7500"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">31</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"ND"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"5.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">32</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"OH"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"5.7500"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">33</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"OK"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"4.5000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">false</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">34</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"PA"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"6.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">35</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"PR"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"6.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">false</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">36</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"RI"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"7.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">false</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">37</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"SC"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"6.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">38</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"SD"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"4.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">39</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"TN"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"7.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">40</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"TX"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"6.2500"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">41</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"UT"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"5.9500"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">false</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">42</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"VT"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"6.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">43</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"VA"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"5.3000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">false</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">44</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"WA"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"6.5000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">45</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"WV"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"6.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">46</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"WI"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"5.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">47</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">country: </span><span class="s2">"US"</span><span class="p">,</span>
      <span class="ss">state: </span><span class="s2">"WY"</span><span class="p">,</span>
      <span class="ss">rate: </span><span class="s2">"4.0000"</span><span class="p">,</span>
      <span class="ss">name: </span><span class="s2">"State Tax"</span><span class="p">,</span>
      <span class="ss">shipping: </span><span class="kp">true</span><span class="p">,</span>
      <span class="ss">order: </span><span class="mi">48</span>
    <span class="p">}</span>
  <span class="p">]</span>
<span class="p">}</span>

<span class="n">woocommerce</span><span class="p">.</span><span class="nf">post</span><span class="p">(</span><span class="s2">"taxes/batch"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="nl">"create"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">72</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"AL"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"4.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">1</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/72"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">73</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"AZ"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5.6000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">2</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/73"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">74</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"AR"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.5000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">3</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/74"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">75</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"CA"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"7.5000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">4</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/75"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">76</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"CO"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2.9000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">5</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/76"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">77</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"CT"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.3500"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">6</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/77"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">78</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"DC"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5.7500"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">7</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/78"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">79</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"FL"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">8</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/79"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">80</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"GA"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"4.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">9</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/80"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">81</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"GU"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"4.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">10</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/81"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">82</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"HI"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"4.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">11</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/82"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">83</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"ID"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">12</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/83"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">84</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"IL"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.2500"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">13</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/84"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">85</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"IN"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"7.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">14</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/85"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">86</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"IA"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">15</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/86"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">87</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"KS"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.1500"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">16</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/87"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">88</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"KY"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">17</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/88"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">89</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"LA"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"4.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">18</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/89"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">90</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"ME"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5.5000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">19</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/90"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">91</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"MD"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">20</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/91"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">92</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"MA"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.2500"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">21</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/92"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">93</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"MI"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">22</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/93"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">94</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"MN"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.8750"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">23</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/94"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">95</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"MS"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"7.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">24</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/95"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">96</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"MO"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"4.2250"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">25</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/96"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">97</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"NE"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5.5000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">26</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/97"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">98</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"NV"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.8500"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">27</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/98"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">99</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"NJ"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"7.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">28</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/99"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">100</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"NM"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5.1250"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">29</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/100"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">101</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"NY"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"4.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">30</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/101"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">102</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"NC"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"4.7500"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">31</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/102"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">103</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"ND"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">32</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/103"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">104</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"OH"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5.7500"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">33</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/104"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">105</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"OK"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"4.5000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">34</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/105"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">106</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"PA"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">35</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/106"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">107</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"PR"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">36</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/107"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">108</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"RI"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"7.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">37</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/108"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">109</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"SC"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">38</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/109"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">110</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"SD"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"4.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">39</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/110"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">111</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"TN"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"7.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">40</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/111"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">112</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"TX"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.2500"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">41</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/112"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">113</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"UT"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5.9500"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">42</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/113"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">114</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"VT"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">43</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/114"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">115</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"VA"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5.3000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">44</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/115"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">116</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"WA"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.5000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">45</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/116"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">117</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"WV"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"6.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">46</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/117"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">118</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"WI"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"5.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">47</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/118"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">119</span><span class="p">,</span><span class="w">
      </span><span class="nl">"country"</span><span class="p">:</span><span class="w"> </span><span class="s2">"US"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"state"</span><span class="p">:</span><span class="w"> </span><span class="s2">"WY"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcode"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"city"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
      </span><span class="nl">"postcodes"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"cities"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
      </span><span class="nl">"rate"</span><span class="p">:</span><span class="w"> </span><span class="s2">"4.0000"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"State Tax"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"priority"</span><span class="p">:</span><span class="w"> </span><span class="mi">0</span><span class="p">,</span><span class="w">
      </span><span class="nl">"compound"</span><span class="p">:</span><span class="w"> </span><span class="kc">false</span><span class="p">,</span><span class="w">
      </span><span class="nl">"shipping"</span><span class="p">:</span><span class="w"> </span><span class="kc">true</span><span class="p">,</span><span class="w">
      </span><span class="nl">"order"</span><span class="p">:</span><span class="w"> </span><span class="mi">48</span><span class="p">,</span><span class="w">
      </span><span class="nl">"class"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/119"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">]</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre></div><h1 id="tax-classes">Tax classes</h1>
<p>The tax classes API allows you to create, view, and delete individual tax classes.</p>
<h2 id="tax-class-properties">Tax class properties</h2>
<table><thead>
<tr>
<th>Attribute</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code>slug</code></td>
<td>string</td>
<td>Unique identifier for the resource. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>name</code></td>
<td>string</td>
<td>Tax class name. <i class="label label-info">required</i></td>
</tr>
</tbody></table>
<h2 id="create-a-tax-class">Create a tax class</h2>
<p>This API helps you to create a new tax class.</p>
<h3 id="http-request">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-post">POST</i>
        <h6>/wp-json/wc/v3/taxes/classes</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <span class="nt">-X</span> POST <?php echo $domain; ?>wp-json/wc/v3/taxes/classes <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret <span class="se">\</span>
    <span class="nt">-H</span> <span class="s2">"Content-Type: application/json"</span> <span class="se">\</span>
    <span class="nt">-d</span> <span class="s1">'{
  "name": "Zero Rate"
}'</span>
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="kd">const</span> <span class="nx">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">Zero Rate</span><span class="dl">"</span>
<span class="p">};</span>

<span class="nx">WooCommerce</span><span class="p">.</span><span class="nx">post</span><span class="p">(</span><span class="dl">"</span><span class="s2">taxes/classes</span><span class="dl">"</span><span class="p">,</span> <span class="nx">data</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span>
<span class="nv">$data</span> <span class="o">=</span> <span class="p">[</span>
    <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'Zero Rate'</span>
<span class="p">];</span>

<span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">post</span><span class="p">(</span><span class="s1">'taxes/classes'</span><span class="p">,</span> <span class="nv">$data</span><span class="p">));</span>
<span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
    <span class="s">"name"</span><span class="p">:</span> <span class="s">"Zero Rate"</span>
<span class="p">}</span>

<span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">post</span><span class="p">(</span><span class="s">"taxes/classes"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="ss">name: </span><span class="s2">"Zero Rate"</span>
<span class="p">}</span>

<span class="n">woocommerce</span><span class="p">.</span><span class="nf">post</span><span class="p">(</span><span class="s2">"taxes/classes"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"zero-rate"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Zero Rate"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
    </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/classes"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre></div><h2 id="list-all-tax-classes">List all tax classes</h2>
<p>This API helps you to view all tax classes.</p>
<h3 id="http-request-2">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-get">GET</i>
        <h6>/wp-json/wc/v3/taxes/classes</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <?php echo $domain; ?>wp-json/wc/v3/taxes/classes <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">taxes/classes</span><span class="dl">"</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span> <span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">get</span><span class="p">(</span><span class="s1">'taxes/classes'</span><span class="p">));</span> <span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">get</span><span class="p">(</span><span class="s">"taxes/classes"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="s2">"taxes/classes"</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">[</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"standard"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Standard Rate"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/classes"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"reduced-rate"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Reduced Rate"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/classes"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"zero-rate"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Zero Rate"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/classes"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">]</span><span class="w">
</span></code></pre></div><h2 id="delete-a-tax-class">Delete a tax class</h2>
<p>This API helps you delete a tax class.</p>

<aside class="warning">
    This also will delete all tax rates from the selected class.
</aside>
<h3 id="http-request-3">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-delete">DELETE</i>
        <h6>/wp-json/wc/v3/taxes/classes/&lt;slug&gt;</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <span class="nt">-X</span> DELETE <?php echo $domain; ?>wp-json/wc/v3/taxes/classes/zero-rate?force<span class="o">=</span><span class="nb">true</span> <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="k">delete</span><span class="p">(</span><span class="dl">"</span><span class="s2">taxes/classes/zero-rate</span><span class="dl">"</span><span class="p">,</span> <span class="p">{</span>
  <span class="na">force</span><span class="p">:</span> <span class="kc">true</span>
<span class="p">})</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span> <span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nb">delete</span><span class="p">(</span><span class="s1">'taxes/classes/zero-rate'</span><span class="p">,</span> <span class="p">[</span><span class="s1">'force'</span> <span class="o">=&gt;</span> <span class="kc">true</span><span class="p">]));</span> <span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">delete</span><span class="p">(</span><span class="s">"taxes/classes/zero-rate"</span><span class="p">,</span> <span class="n">params</span><span class="o">=</span><span class="p">{</span><span class="s">"force"</span><span class="p">:</span> <span class="bp">True</span><span class="p">}).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">delete</span><span class="p">(</span><span class="s2">"taxes/classes/zero-rate"</span><span class="p">,</span> <span class="ss">force: </span><span class="kp">true</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="nl">"slug"</span><span class="p">:</span><span class="w"> </span><span class="s2">"zero-rate"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Zero Rate"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
    </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/taxes/classes"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre></div><h4 id="available-parameters">Available parameters</h4>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code>force</code></td>
<td>string</td>
<td>Required to be <code>true</code>, since this resource does not support trashing.</td>
</tr>
</tbody></table>
<h1 id="webhooks">Webhooks</h1>
<p>The webhooks API allows you to create, view, update, and delete individual, or a batch, of webhooks.</p>

<p>Webhooks can be managed via the WooCommerce settings screen or by using the REST API endpoints. The <code>WC_Webhook</code> class manages all data storage and retrieval of the webhook custom post type, as well as enqueuing webhook actions and processing/delivering/logging webhooks. On <code>woocommerce_init</code>, active webhooks are loaded.</p>

<p>Each webhook has:</p>

<ul>
<li><code>status</code>: active (delivers payload), paused (delivery paused by admin), disabled (delivery paused by failure).</li>
<li><code>topic</code>: determines which resource events the webhook is triggered for.</li>
<li><code>delivery URL</code>: URL where the payload is delivered, must be HTTP or HTTPS.</li>
<li><code>secret</code>: an optional secret key that is used to generate a HMAC-SHA256 hash of the request body so the receiver can verify authenticity of the webhook.</li>
<li><code>hooks</code>: an array of hook names that are added and bound to the webhook for processing.</li>
</ul>
<h3 id="topics">Topics</h3>
<p>The topic is a combination resource (e.g. order) and event (e.g. created) and maps to one or more hook names (e.g. <code>woocommerce_checkout_order_processed</code>). Webhooks can be created using the topic name and the appropriate hooks are automatically added.</p>

<p>Core topics are:</p>

<ul>
<li>Coupons: <code>coupon.created</code>, <code>coupon.updated</code> and <code>coupon.deleted</code>.</li>
<li>Customers: <code>customer.created</code>, <code>customer.updated</code> and <code>customer.deleted</code>.</li>
<li>Orders: <code>order.created</code>, <code>order.updated</code> and <code>order.deleted</code>.</li>
<li>Products: <code>product.created</code>, <code>product.updated</code> and <code>product.deleted</code>.</li>
</ul>

<p>Custom topics can also be used which map to a single hook name, for example you could add a webhook with topic <code>action.woocommerce_add_to_cart</code> that is triggered on that event. Custom topics pass the first hook argument to the payload, so in this example the <code>cart_item_key</code> would be included in the payload.</p>
<h3 id="delivery-payload">Delivery/payload</h3>
<p>Delivery is performed using <code>wp_remote_post()</code> (HTTP POST) and processed in the background by default using wp-cron. A few custom headers are added to the request to help the receiver process the webhook:</p>

<ul>
<li><code>X-WC-Webhook-Source</code>: <code>http://example.com/</code>.</li>
<li><code>X-WC-Webhook-Topic</code> - e.g. <code>order.updated</code>.</li>
<li><code>X-WC-Webhook-Resource</code> - e.g. <code>order</code>.</li>
<li><code>X-WC-Webhook-Event</code> - e.g. <code>updated</code>.</li>
<li><code>X-WC-Webhook-Signature</code> - a base64 encoded HMAC-SHA256 hash of the payload.</li>
<li><code>X-WC-Webhook-ID</code> - webhook's post ID.</li>
<li><code>X-WC-Delivery-ID</code> - delivery log ID (a comment).</li>
</ul>

<p>The payload is JSON encoded and for API resources (coupons, customers, orders, products), the response is exactly the same as if requested via the REST API.</p>
<h3 id="logging">Logging</h3>
<p>Requests/responses are logged using the WooCommerce logging system. Each delivery log includes:</p>

<ul>
<li>Request duration.</li>
<li>Request URL, method, headers, and body.</li>
<li>Response Code, message, headers, and body.</li>
</ul>

<p>After 5 consecutive failed deliveries (as defined by a non HTTP 2xx response code), the webhook is disabled and must be edited via the REST API to re-enable.</p>

<p>Delivery logs can be accessed in "WooCommerce" &gt; "Status" &gt; "Logs".</p>
<h3 id="visual-interface">Visual interface</h3>
<p>You can find the Webhooks interface going to "WooCommerce" &gt; "Settings" &gt; "Advanced" &gt; "Webhooks", see our <a href="https://docs.woocommerce.com/document/webhooks/">Visual Webhooks docs</a> for more details.</p>
<h2 id="webhook-properties">Webhook properties</h2>
<table><thead>
<tr>
<th>Attribute</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code>id</code></td>
<td>integer</td>
<td>Unique identifier for the resource. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>name</code></td>
<td>string</td>
<td>A friendly name for the webhook.</td>
</tr>
<tr>
<td><code>status</code></td>
<td>string</td>
<td>Webhook status. Options: <code>active</code>, <code>paused</code> and <code>disabled</code>. Default is <code>active</code>.</td>
</tr>
<tr>
<td><code>topic</code></td>
<td>string</td>
<td>Webhook topic. <i class="label label-info">mandatory</i></td>
</tr>
<tr>
<td><code>resource</code></td>
<td>string</td>
<td>Webhook resource. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>event</code></td>
<td>string</td>
<td>Webhook event. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>hooks</code></td>
<td>array</td>
<td>WooCommerce action names associated with the webhook. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>delivery_url</code></td>
<td>string</td>
<td>The URL where the webhook payload is delivered. <i class="label label-info">read-only</i> <i class="label label-info">mandatory</i></td>
</tr>
<tr>
<td><code>secret</code></td>
<td>string</td>
<td>Secret key used to generate a hash of the delivered webhook and provided in the request headers. This will default is a MD5 hash from the current user's ID</td>
</tr>
<tr>
<td><code>date_created</code></td>
<td>date-time</td>
<td>The date the webhook was created, in the site's timezone. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>date_created_gmt</code></td>
<td>date-time</td>
<td>The date the webhook was created, as GMT. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>date_modified</code></td>
<td>date-time</td>
<td>The date the webhook was last modified, in the site's timezone. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>date_modified_gmt</code></td>
<td>date-time</td>
<td>The date the webhook was last modified, as GMT. <i class="label label-info">read-only</i></td>
</tr>
</tbody></table>
<h2 id="create-a-webhook">Create a webhook</h2>
<p>This API helps you to create a new webhook.</p>
<h3 id="http-request">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-post">POST</i>
        <h6>/wp-json/wc/v3/webhooks</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <span class="nt">-X</span> POST <?php echo $domain; ?>wp-json/wc/v3/webhooks <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret <span class="se">\</span>
    <span class="nt">-H</span> <span class="s2">"Content-Type: application/json"</span> <span class="se">\</span>
    <span class="nt">-d</span> <span class="s1">'{
  "name": "Order updated",
  "topic": "order.updated",
  "delivery_url": "http://requestb.in/1g0sxmo1"
}'</span>
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="kd">const</span> <span class="nx">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">Order updated</span><span class="dl">"</span><span class="p">,</span>
  <span class="na">topic</span><span class="p">:</span> <span class="dl">"</span><span class="s2">order.updated</span><span class="dl">"</span><span class="p">,</span>
  <span class="na">delivery_url</span><span class="p">:</span> <span class="dl">"</span><span class="s2">http://requestb.in/1g0sxmo1</span><span class="dl">"</span>
<span class="p">};</span>

<span class="nx">WooCommerce</span><span class="p">.</span><span class="nx">post</span><span class="p">(</span><span class="dl">"</span><span class="s2">webhooks</span><span class="dl">"</span><span class="p">,</span> <span class="nx">data</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span>
<span class="nv">$data</span> <span class="o">=</span> <span class="p">[</span>
    <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'Order updated'</span><span class="p">,</span>
    <span class="s1">'topic'</span> <span class="o">=&gt;</span> <span class="s1">'order.updated'</span><span class="p">,</span>
    <span class="s1">'delivery_url'</span> <span class="o">=&gt;</span> <span class="s1">'http://requestb.in/1g0sxmo1'</span>
<span class="p">];</span>

<span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">post</span><span class="p">(</span><span class="s1">'webhooks'</span><span class="p">,</span> <span class="nv">$data</span><span class="p">));</span>
<span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
    <span class="s">"name"</span><span class="p">:</span> <span class="s">"Order updated"</span><span class="p">,</span>
    <span class="s">"topic"</span><span class="p">:</span> <span class="s">"order.updated"</span><span class="p">,</span>
    <span class="s">"delivery_url"</span><span class="p">:</span> <span class="s">"http://requestb.in/1g0sxmo1"</span>
<span class="p">}</span>

<span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">post</span><span class="p">(</span><span class="s">"webhooks"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="ss">name: </span><span class="s2">"Order updated"</span><span class="p">,</span>
  <span class="ss">topic: </span><span class="s2">"order.updated"</span><span class="p">,</span>
  <span class="ss">delivery_url: </span><span class="s2">"http://requestb.in/1g0sxmo1"</span>
<span class="p">}</span>

<span class="n">woocommerce</span><span class="p">.</span><span class="nf">post</span><span class="p">(</span><span class="s2">"webhooks"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">142</span><span class="p">,</span><span class="w">
  </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Order updated"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"active"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"topic"</span><span class="p">:</span><span class="w"> </span><span class="s2">"order.updated"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"resource"</span><span class="p">:</span><span class="w"> </span><span class="s2">"order"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"event"</span><span class="p">:</span><span class="w"> </span><span class="s2">"updated"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"hooks"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
    </span><span class="s2">"woocommerce_process_shop_order_meta"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"woocommerce_api_edit_order"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"woocommerce_order_edit_status"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"woocommerce_order_status_changed"</span><span class="w">
  </span><span class="p">],</span><span class="w">
  </span><span class="nl">"delivery_url"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://requestb.in/1g0sxmo1"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T23:17:52"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T20:17:52"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"date_modified"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T23:17:52"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"date_modified_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T20:17:52"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
    </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/webhooks/142"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/webhooks"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre></div><h2 id="retrieve-a-webhook">Retrieve a webhook</h2>
<p>This API lets you retrieve and view a specific webhook.</p>
<h3 id="http-request-2">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-get">GET</i>
        <h6>/wp-json/wc/v3/webhooks/&lt;id&gt;</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <?php echo $domain; ?>wp-json/wc/v3/webhooks/142 <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">webhooks/142</span><span class="dl">"</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span> <span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">get</span><span class="p">(</span><span class="s1">'webhooks/142'</span><span class="p">));</span> <span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">get</span><span class="p">(</span><span class="s">"webhooks/142"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="s2">"webhooks/142"</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">142</span><span class="p">,</span><span class="w">
  </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Order updated"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"active"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"topic"</span><span class="p">:</span><span class="w"> </span><span class="s2">"order.updated"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"resource"</span><span class="p">:</span><span class="w"> </span><span class="s2">"order"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"event"</span><span class="p">:</span><span class="w"> </span><span class="s2">"updated"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"hooks"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
    </span><span class="s2">"woocommerce_process_shop_order_meta"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"woocommerce_api_edit_order"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"woocommerce_order_edit_status"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"woocommerce_order_status_changed"</span><span class="w">
  </span><span class="p">],</span><span class="w">
  </span><span class="nl">"delivery_url"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://requestb.in/1g0sxmo1"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T23:17:52"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T20:17:52"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"date_modified"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T23:17:52"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"date_modified_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T20:17:52"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
    </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/webhooks/142"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/webhooks"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre></div><h2 id="list-all-webhooks">List all webhooks</h2>
<p>This API helps you to view all the webhooks.</p>
<h3 id="http-request-3">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-get">GET</i>
        <h6>/wp-json/wc/v3/webhooks</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <?php echo $domain; ?>wp-json/wc/v3/webhooks <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">webhooks</span><span class="dl">"</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span> <span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">get</span><span class="p">(</span><span class="s1">'webhooks'</span><span class="p">));</span> <span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">get</span><span class="p">(</span><span class="s">"webhooks"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="s2">"webhooks"</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">[</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">143</span><span class="p">,</span><span class="w">
    </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Customer created"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"active"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"topic"</span><span class="p">:</span><span class="w"> </span><span class="s2">"customer.created"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"resource"</span><span class="p">:</span><span class="w"> </span><span class="s2">"customer"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"event"</span><span class="p">:</span><span class="w"> </span><span class="s2">"created"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"hooks"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="s2">"user_register"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"woocommerce_created_customer"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"woocommerce_api_create_customer"</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"delivery_url"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://requestb.in/1g0sxmo1"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T23:17:52"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T20:17:52"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"date_modified"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T23:17:52"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"date_modified_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T20:17:52"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/webhooks/143"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/webhooks"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">142</span><span class="p">,</span><span class="w">
    </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Order updated"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"active"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"topic"</span><span class="p">:</span><span class="w"> </span><span class="s2">"order.updated"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"resource"</span><span class="p">:</span><span class="w"> </span><span class="s2">"order"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"event"</span><span class="p">:</span><span class="w"> </span><span class="s2">"updated"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"hooks"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="s2">"woocommerce_process_shop_order_meta"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"woocommerce_api_edit_order"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"woocommerce_order_edit_status"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"woocommerce_order_status_changed"</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"delivery_url"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://requestb.in/1g0sxmo1"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T23:17:52"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T20:17:52"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"date_modified"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T23:17:52"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"date_modified_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T20:17:52"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/webhooks/142"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/webhooks"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">]</span><span class="w">
</span></code></pre></div><h4 id="available-parameters">Available parameters</h4>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
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
<td><code>status</code></td>
<td>string</td>
<td>Limit result set to webhooks assigned a specific status. Options: <code>all</code>, <code>active</code>, <code>paused</code> and <code>disabled</code>. Default is <code>all</code>.</td>
</tr>
</tbody></table>
<h2 id="update-a-webhook">Update a webhook</h2>
<p>This API lets you make changes to a webhook.</p>
<h3 id="http-request-4">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-put">PUT</i>
        <h6>/wp-json/wc/v3/webhook/&lt;id&gt;</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <span class="nt">-X</span> PUT <?php echo $domain; ?>wp-json/wc/v3/webhook/142 <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret <span class="se">\</span>
    <span class="nt">-H</span> <span class="s2">"Content-Type: application/json"</span> <span class="se">\</span>
    <span class="nt">-d</span> <span class="s1">'{
  "status": "paused"
}'</span>
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="kd">const</span> <span class="nx">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="na">status</span><span class="p">:</span> <span class="dl">"</span><span class="s2">paused</span><span class="dl">"</span>
<span class="p">}</span>

<span class="nx">WooCommerce</span><span class="p">.</span><span class="nx">put</span><span class="p">(</span><span class="dl">"</span><span class="s2">webhooks/142</span><span class="dl">"</span><span class="p">,</span> <span class="nx">data</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span>
<span class="nv">$data</span> <span class="o">=</span> <span class="p">[</span>
    <span class="s1">'status'</span> <span class="o">=&gt;</span> <span class="s1">'paused'</span>
<span class="p">];</span>

<span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">put</span><span class="p">(</span><span class="s1">'webhooks/142'</span><span class="p">,</span> <span class="nv">$data</span><span class="p">));</span>
<span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
    <span class="s">"status"</span><span class="p">:</span> <span class="s">"paused"</span>
<span class="p">}</span>

<span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">put</span><span class="p">(</span><span class="s">"webhooks/142"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="ss">status: </span><span class="s2">"paused"</span>
<span class="p">}</span>

<span class="n">woocommerce</span><span class="p">.</span><span class="nf">put</span><span class="p">(</span><span class="s2">"webhooks/142"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">142</span><span class="p">,</span><span class="w">
  </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Order updated"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"paused"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"topic"</span><span class="p">:</span><span class="w"> </span><span class="s2">"order.updated"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"resource"</span><span class="p">:</span><span class="w"> </span><span class="s2">"order"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"event"</span><span class="p">:</span><span class="w"> </span><span class="s2">"updated"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"hooks"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
    </span><span class="s2">"woocommerce_process_shop_order_meta"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"woocommerce_api_edit_order"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"woocommerce_order_edit_status"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"woocommerce_order_status_changed"</span><span class="w">
  </span><span class="p">],</span><span class="w">
  </span><span class="nl">"delivery_url"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://requestb.in/1g0sxmo1"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T23:17:52"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T20:17:52"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"date_modified"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T17:30:12"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"date_modified_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T20:30:12"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
    </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/webhooks/142"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/webhooks"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre></div><h2 id="delete-a-webhook">Delete a webhook</h2>
<p>This API helps you delete a webhook.</p>
<h3 id="http-request-5">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-delete">DELETE</i>
        <h6>/wp-json/wc/v3/webhooks/&lt;id&gt;</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <span class="nt">-X</span> DELETE <?php echo $domain; ?>wp-json/wc/v3/webhooks/142 <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="k">delete</span><span class="p">(</span><span class="dl">"</span><span class="s2">webhooks/142</span><span class="dl">"</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span> <span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nb">delete</span><span class="p">(</span><span class="s1">'webhooks/142'</span><span class="p">));</span> <span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">delete</span><span class="p">(</span><span class="s">"webhooks/142"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">delete</span><span class="p">(</span><span class="s2">"webhooks/142"</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">142</span><span class="p">,</span><span class="w">
  </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Order updated"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"paused"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"topic"</span><span class="p">:</span><span class="w"> </span><span class="s2">"order.updated"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"resource"</span><span class="p">:</span><span class="w"> </span><span class="s2">"order"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"event"</span><span class="p">:</span><span class="w"> </span><span class="s2">"updated"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"hooks"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
    </span><span class="s2">"woocommerce_process_shop_order_meta"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"woocommerce_api_edit_order"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"woocommerce_order_edit_status"</span><span class="p">,</span><span class="w">
    </span><span class="s2">"woocommerce_order_status_changed"</span><span class="w">
  </span><span class="p">],</span><span class="w">
  </span><span class="nl">"delivery_url"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://requestb.in/1g0sxmo1"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T23:17:52"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T20:17:52"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"date_modified"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T23:30:12"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"date_modified_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T20:30:12"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
    </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/webhooks/142"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/webhooks"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre></div><h4 id="available-parameters-2">Available parameters</h4>
<table><thead>
<tr>
<th>Parameter</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code>force</code></td>
<td>string</td>
<td>Use <code>true</code> whether to permanently delete the webhook, Defaults is <code>false</code>.</td>
</tr>
</tbody></table>
<h2 id="batch-update-webhooks">Batch update webhooks</h2>
<p>This API helps you to batch create, update and delete multiple webhooks.</p>

<aside class="notice">
Note: By default it's limited to up to 100 objects to be created, updated or deleted. 
</aside>
<h3 id="http-request-6">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-post">POST</i>
        <h6>/wp-json/wc/v3/webhooks/batch</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <span class="nt">-X</span> POST <?php echo $domain; ?>/wp-json/wc/v3/webhooks/batch <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret <span class="se">\</span>
    <span class="nt">-H</span> <span class="s2">"Content-Type: application/json"</span> <span class="se">\</span>
    <span class="nt">-d</span> <span class="s1">'{
  "create": [
    {
      "name": "Coupon created",
      "topic": "coupon.created",
      "delivery_url": "http://requestb.in/1g0sxmo1"
    },
    {
      "name": "Customer deleted",
      "topic": "customer.deleted",
      "delivery_url": "http://requestb.in/1g0sxmo1"
    }
  ],
  "delete": [
    143
  ]
}'</span>
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="kd">const</span> <span class="nx">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="na">create</span><span class="p">:</span> <span class="p">[</span>
    <span class="p">{</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">Round toe</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">topic</span><span class="p">:</span> <span class="dl">"</span><span class="s2">coupon.created</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">delivery_url</span><span class="p">:</span> <span class="dl">"</span><span class="s2">http://requestb.in/1g0sxmo1</span><span class="dl">"</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">name</span><span class="p">:</span> <span class="dl">"</span><span class="s2">Customer deleted</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">topic</span><span class="p">:</span> <span class="dl">"</span><span class="s2">customer.deleted</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">delivery_url</span><span class="p">:</span> <span class="dl">"</span><span class="s2">http://requestb.in/1g0sxmo1</span><span class="dl">"</span>
    <span class="p">}</span>
  <span class="p">],</span>
  <span class="na">delete</span><span class="p">:</span> <span class="p">[</span>
    <span class="mi">143</span>
  <span class="p">]</span>
<span class="p">};</span>

<span class="nx">WooCommerce</span><span class="p">.</span><span class="nx">post</span><span class="p">(</span><span class="dl">"</span><span class="s2">webhooks/batch</span><span class="dl">"</span><span class="p">,</span> <span class="nx">data</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span>
<span class="nv">$data</span> <span class="o">=</span> <span class="p">[</span>
    <span class="s1">'create'</span> <span class="o">=&gt;</span> <span class="p">[</span>
        <span class="p">[</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'Round toe'</span><span class="p">,</span>
            <span class="s1">'topic'</span> <span class="o">=&gt;</span> <span class="s1">'coupon.created'</span><span class="p">,</span>
            <span class="s1">'delivery_url'</span> <span class="o">=&gt;</span> <span class="s1">'http://requestb.in/1g0sxmo1'</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'name'</span> <span class="o">=&gt;</span> <span class="s1">'Customer deleted'</span><span class="p">,</span>
            <span class="s1">'topic'</span> <span class="o">=&gt;</span> <span class="s1">'customer.deleted'</span><span class="p">,</span>
            <span class="s1">'delivery_url'</span> <span class="o">=&gt;</span> <span class="s1">'http://requestb.in/1g0sxmo1'</span>
        <span class="p">]</span>
    <span class="p">],</span>
    <span class="s1">'delete'</span> <span class="o">=&gt;</span> <span class="p">[</span>
        <span class="mi">143</span>
    <span class="p">]</span>
<span class="p">];</span>

<span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">post</span><span class="p">(</span><span class="s1">'webhooks/batch'</span><span class="p">,</span> <span class="nv">$data</span><span class="p">));</span>
<span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
    <span class="s">"create"</span><span class="p">:</span> <span class="p">[</span>
        <span class="p">{</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"Round toe"</span><span class="p">,</span>
            <span class="s">"topic"</span><span class="p">:</span> <span class="s">"coupon.created"</span><span class="p">,</span>
            <span class="s">"delivery_url"</span><span class="p">:</span> <span class="s">"http://requestb.in/1g0sxmo1"</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"name"</span><span class="p">:</span> <span class="s">"Customer deleted"</span><span class="p">,</span>
            <span class="s">"topic"</span><span class="p">:</span> <span class="s">"customer.deleted"</span><span class="p">,</span>
            <span class="s">"delivery_url"</span><span class="p">:</span> <span class="s">"http://requestb.in/1g0sxmo1"</span>
        <span class="p">}</span>
    <span class="p">],</span>
    <span class="s">"delete"</span><span class="p">:</span> <span class="p">[</span>
        <span class="mi">143</span>
    <span class="p">]</span>
<span class="p">}</span>

<span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">post</span><span class="p">(</span><span class="s">"webhooks/batch"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="ss">create: </span><span class="p">[</span>
    <span class="p">{</span>
      <span class="ss">name: </span><span class="s2">"Round toe"</span><span class="p">,</span>
      <span class="ss">topic: </span><span class="s2">"coupon.created"</span><span class="p">,</span>
      <span class="ss">delivery_url: </span><span class="s2">"http://requestb.in/1g0sxmo1"</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">name: </span><span class="s2">"Customer deleted"</span><span class="p">,</span>
      <span class="ss">topic: </span><span class="s2">"customer.deleted"</span><span class="p">,</span>
      <span class="ss">delivery_url: </span><span class="s2">"http://requestb.in/1g0sxmo1"</span>
    <span class="p">}</span>
  <span class="p">],</span>
  <span class="ss">delete: </span><span class="p">[</span>
    <span class="mi">143</span>
  <span class="p">]</span>
<span class="p">}</span>

<span class="n">woocommerce</span><span class="p">.</span><span class="nf">post</span><span class="p">(</span><span class="s2">"webhooks/batch"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="nl">"create"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">146</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Coupon created"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"active"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"topic"</span><span class="p">:</span><span class="w"> </span><span class="s2">"coupon.created"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"resource"</span><span class="p">:</span><span class="w"> </span><span class="s2">"coupon"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"event"</span><span class="p">:</span><span class="w"> </span><span class="s2">"created"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"hooks"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="s2">"woocommerce_process_shop_coupon_meta"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"woocommerce_api_create_coupon"</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"delivery_url"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://requestb.in/1g0sxmo1"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-25T01:56:26"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-24T22:56:26"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"date_modified"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-25T01:56:26"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"date_modified_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-24T22:56:26"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/webhooks/146"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/webhooks"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">147</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Customer deleted"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"active"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"topic"</span><span class="p">:</span><span class="w"> </span><span class="s2">"customer.deleted"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"resource"</span><span class="p">:</span><span class="w"> </span><span class="s2">"customer"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"event"</span><span class="p">:</span><span class="w"> </span><span class="s2">"deleted"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"hooks"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="s2">"delete_user"</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"delivery_url"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://requestb.in/1g0sxmo1"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-25T01:56:30"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-24T22:56:30"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"date_modified"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-25T01:56:30"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"date_modified_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-24T22:56:30"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/webhooks/147"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/webhooks"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">],</span><span class="w">
  </span><span class="nl">"delete"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="mi">143</span><span class="p">,</span><span class="w">
      </span><span class="nl">"name"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Webhook created on May 24, 2016 @ 03:20 AM"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"status"</span><span class="p">:</span><span class="w"> </span><span class="s2">"active"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"topic"</span><span class="p">:</span><span class="w"> </span><span class="s2">"customer.created"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"resource"</span><span class="p">:</span><span class="w"> </span><span class="s2">"customer"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"event"</span><span class="p">:</span><span class="w"> </span><span class="s2">"created"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"hooks"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="s2">"user_register"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"woocommerce_created_customer"</span><span class="p">,</span><span class="w">
        </span><span class="s2">"woocommerce_api_create_customer"</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"delivery_url"</span><span class="p">:</span><span class="w"> </span><span class="s2">"http://requestb.in/1g0sxmo1"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"date_created"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T23:17:52"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"date_created_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T20:17:52"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"date_modified"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T23:17:52"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"date_modified_gmt"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2016-05-15T20:17:52"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/webhooks/143"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/webhooks"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">]</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre></div><h1 id="settings">Settings</h1>
<p>The settings API allows you to view all groups of settings available.</p>
<h2 id="setting-group-properties">Setting group properties</h2>
<table><thead>
<tr>
<th>Attribute</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code>id</code></td>
<td>string</td>
<td>A unique identifier that can be used to link settings together. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>label</code></td>
<td>string</td>
<td>A human readable label for the setting used in interfaces. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>description</code></td>
<td>string</td>
<td>A human readable description for the setting used in interfaces. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>parent_id</code></td>
<td>string</td>
<td>ID of parent grouping. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>sub_groups</code></td>
<td>string</td>
<td>IDs for settings sub groups. <i class="label label-info">read-only</i></td>
</tr>
</tbody></table>
<h2 id="list-all-settings-groups">List all settings groups</h2>
<p>This API helps you to view all the settings groups.</p>
<h3 id="http-request">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-get">GET</i>
        <h6>/wp-json/wc/v3/settings</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <?php echo $domain; ?>wp-json/wc/v3/settings <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">settings</span><span class="dl">"</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span> <span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">get</span><span class="p">(</span><span class="s1">'settings'</span><span class="p">));</span> <span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">get</span><span class="p">(</span><span class="s">"settings"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="s2">"settings"</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">[</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"general"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"General"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"sub_groups"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"products"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Products"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"sub_groups"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/products"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"tax"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tax"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"sub_groups"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/tax"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"shipping"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Shipping"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"sub_groups"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/shipping"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"checkout"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Checkout"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"sub_groups"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/checkout"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"account"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Accounts"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"sub_groups"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/account"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Emails"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"sub_groups"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="s2">"email_new_order"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"email_cancelled_order"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"email_failed_order"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"email_customer_on_hold_order"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"email_customer_processing_order"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"email_customer_completed_order"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"email_customer_refunded_order"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"email_customer_invoice"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"email_customer_note"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"email_customer_reset_password"</span><span class="p">,</span><span class="w">
      </span><span class="s2">"email_customer_new_account"</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/email"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"integration"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Integration"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"sub_groups"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/integration"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"api"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"API"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"sub_groups"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/api"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email_new_order"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"New order"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"New order emails are sent to chosen recipient(s) when a new order is received."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"sub_groups"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/email_new_order"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email_cancelled_order"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cancelled order"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cancelled order emails are sent to chosen recipient(s) when orders have been marked cancelled (if they were previously processing or on-hold)."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"sub_groups"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/email_cancelled_order"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email_failed_order"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Failed order"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Failed order emails are sent to chosen recipient(s) when orders have been marked failed (if they were previously processing or on-hold)."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"sub_groups"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/email_failed_order"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email_customer_on_hold_order"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Order on-hold"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This is an order notification sent to customers containing order details after an order is placed on-hold."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"sub_groups"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/email_customer_on_hold_order"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email_customer_processing_order"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Processing order"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This is an order notification sent to customers containing order details after payment."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"sub_groups"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/email_customer_processing_order"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email_customer_completed_order"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Completed order"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Order complete emails are sent to customers when their orders are marked completed and usually indicate that their orders have been shipped."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"sub_groups"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/email_customer_completed_order"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email_customer_refunded_order"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Refunded order"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Order refunded emails are sent to customers when their orders are marked refunded."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"sub_groups"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/email_customer_refunded_order"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email_customer_invoice"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Customer invoice"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Customer invoice emails can be sent to customers containing their order information and payment links."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"sub_groups"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/email_customer_invoice"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email_customer_note"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Customer note"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Customer note emails are sent when you add a note to an order."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"sub_groups"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/email_customer_note"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email_customer_reset_password"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Reset password"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Customer </span><span class="se">\"</span><span class="s2">reset password</span><span class="se">\"</span><span class="s2"> emails are sent when customers reset their passwords."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"sub_groups"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/email_customer_reset_password"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email_customer_new_account"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"New account"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Customer </span><span class="se">\"</span><span class="s2">new account</span><span class="se">\"</span><span class="s2"> emails are sent to the customer when a customer signs up via checkout or account pages."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"parent_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"email"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"sub_groups"</span><span class="p">:</span><span class="w"> </span><span class="p">[],</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/email_customer_new_account"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">]</span><span class="w">
</span></code></pre></div><h1 id="setting-options">Setting options</h1><h2 id="setting-option-properties">Setting option properties</h2>
<table><thead>
<tr>
<th>Attribute</th>
<th>Type</th>
<th>Description</th>
</tr>
</thead><tbody>
<tr>
<td><code>id</code></td>
<td>string</td>
<td>A unique identifier for the setting. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>label</code></td>
<td>string</td>
<td>A human readable label for the setting used in interfaces. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>description</code></td>
<td>string</td>
<td>A human readable description for the setting used in interfaces. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>value</code></td>
<td>mixed</td>
<td>Setting value.</td>
</tr>
<tr>
<td><code>default</code></td>
<td>mixed</td>
<td>Default value for the setting. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>tip</code></td>
<td>string</td>
<td>Additional help text shown to the user about the setting. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>placeholder</code></td>
<td>string</td>
<td>Placeholder text to be displayed in text inputs. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>type</code></td>
<td>string</td>
<td>Type of setting. Options: <code>text</code>, <code>email</code>, <code>number</code>, <code>color</code>, <code>password</code>, <code>textarea</code>, <code>select</code>, <code>multiselect</code>, <code>radio</code>, <code>image_width</code> and <code>checkbox</code>. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>options</code></td>
<td>object</td>
<td>Array of options (key value pairs) for inputs such as select, multiselect, and radio buttons. <i class="label label-info">read-only</i></td>
</tr>
<tr>
<td><code>group_id</code></td>
<td>string</td>
<td>An identifier for the group this setting belongs to. <i class="label label-info">read-only</i></td>
</tr>
</tbody></table>
<h2 id="retrieve-a-setting-option">Retrieve a setting option</h2>
<p>This API lets you retrieve and view a specific setting option.</p>
<h3 id="http-request">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-get">GET</i>
        <h6>/wp-json/wc/v3/settings/&lt;group_id&gt;/&lt;id&gt;</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <?php echo $domain; ?>wp-json/wc/v3/settings/general/woocommerce_allowed_countries <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">settings/general/woocommerce_allowed_countries</span><span class="dl">"</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span> <span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">get</span><span class="p">(</span><span class="s1">'settings/general/woocommerce_allowed_countries'</span><span class="p">));</span> <span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">get</span><span class="p">(</span><span class="s">"settings/general/woocommerce_allowed_countries"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="s2">"settings/general/woocommerce_allowed_countries"</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"woocommerce_allowed_countries"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Selling location(s)"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This option lets you limit which countries you are willing to sell to."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"select"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"default"</span><span class="p">:</span><span class="w"> </span><span class="s2">"all"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"all"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sell to all countries"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"all_except"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sell to all countries, except for&amp;hellip;"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"specific"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sell to specific countries"</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="nl">"tip"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This option lets you limit which countries you are willing to sell to."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"value"</span><span class="p">:</span><span class="w"> </span><span class="s2">"all"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"group_id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"general"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="p">{</span><span class="w">
                </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general/woocommerce_allowed_countries"</span><span class="w">
            </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
            </span><span class="p">{</span><span class="w">
                </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general"</span><span class="w">
            </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre></div><h2 id="list-all-setting-options">List all setting options</h2>
<p>This API helps you to view all the setting options.</p>
<h3 id="http-request-2">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-get">GET</i>
        <h6>/wp-json/wc/v3/settings/&lt;id&gt;</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <?php echo $domain; ?>wp-json/wc/v3/settings/general <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="nx">WooCommerce</span><span class="p">.</span><span class="kd">get</span><span class="p">(</span><span class="dl">"</span><span class="s2">settings/general</span><span class="dl">"</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span> <span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">get</span><span class="p">(</span><span class="s1">'settings/general'</span><span class="p">));</span> <span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">get</span><span class="p">(</span><span class="s">"settings/general"</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">woocommerce</span><span class="p">.</span><span class="nf">get</span><span class="p">(</span><span class="s2">"settings/general"</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">[</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"woocommerce_allowed_countries"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Selling location(s)"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This option lets you limit which countries you are willing to sell to."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"select"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"default"</span><span class="p">:</span><span class="w"> </span><span class="s2">"all"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"all"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sell to all countries"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"all_except"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sell to all countries, except for&amp;hellip;"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"specific"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sell to specific countries"</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="nl">"tip"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This option lets you limit which countries you are willing to sell to."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"value"</span><span class="p">:</span><span class="w"> </span><span class="s2">"all"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general/woocommerce_allowed_countries"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"woocommerce_all_except_countries"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sell to all countries, except for&amp;hellip;"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"multiselect"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"default"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"value"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"AX"</span><span class="p">:</span><span class="w"> </span><span class="s2">"&amp;#197;land Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Afghanistan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Albania"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"DZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Algeria"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"American Samoa"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Andorra"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Angola"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Anguilla"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AQ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Antarctica"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Antigua and Barbuda"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Argentina"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Armenia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Aruba"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Australia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Austria"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Azerbaijan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bahamas"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bahrain"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bangladesh"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Barbados"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Belarus"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Belau"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Belgium"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Belize"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BJ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Benin"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bermuda"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bhutan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bolivia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BQ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bonaire, Saint Eustatius and Saba"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bosnia and Herzegovina"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Botswana"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BV"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bouvet Island"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Brazil"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"British Indian Ocean Territory"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"British Virgin Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Brunei"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bulgaria"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Burkina Faso"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Burundi"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cambodia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cameroon"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Canada"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CV"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cape Verde"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cayman Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Central African Republic"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Chad"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Chile"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"China"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CX"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Christmas Island"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cocos (Keeling) Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Colombia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Comoros"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Congo (Brazzaville)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Congo (Kinshasa)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cook Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Costa Rica"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Croatia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cuba"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cura&amp;ccedil;ao"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cyprus"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Czech Republic"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"DK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Denmark"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"DJ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Djibouti"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"DM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Dominica"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"DO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Dominican Republic"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"EC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ecuador"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"EG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Egypt"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SV"</span><span class="p">:</span><span class="w"> </span><span class="s2">"El Salvador"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GQ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Equatorial Guinea"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ER"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Eritrea"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"EE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Estonia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ET"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ethiopia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"FK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Falkland Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"FO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Faroe Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"FJ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Fiji"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"FI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Finland"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"FR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"France"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"French Guiana"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"French Polynesia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"French Southern Territories"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Gabon"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Gambia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Georgia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"DE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Germany"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ghana"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Gibraltar"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Greece"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Greenland"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Grenada"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guadeloupe"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guam"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guatemala"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guernsey"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guinea"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guinea-Bissau"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guyana"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Haiti"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Heard Island and McDonald Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Honduras"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Hong Kong"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Hungary"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Iceland"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"India"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ID"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Indonesia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Iran"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IQ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Iraq"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ireland"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Isle of Man"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Israel"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Italy"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ivory Coast"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"JM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Jamaica"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"JP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Japan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"JE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Jersey"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"JO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Jordan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kazakhstan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kenya"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kiribati"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kuwait"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kyrgyzstan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Laos"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LV"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Latvia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lebanon"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lesotho"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Liberia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Libya"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Liechtenstein"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lithuania"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Luxembourg"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Macao S.A.R., China"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Macedonia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Madagascar"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Malawi"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Malaysia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MV"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Maldives"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ML"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mali"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Malta"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Marshall Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MQ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Martinique"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mauritania"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mauritius"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"YT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mayotte"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MX"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mexico"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"FM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Micronesia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Moldova"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Monaco"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mongolia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ME"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Montenegro"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Montserrat"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Morocco"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mozambique"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Myanmar"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Namibia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Nauru"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Nepal"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Netherlands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"New Caledonia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"New Zealand"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Nicaragua"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Niger"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Nigeria"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Niue"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Norfolk Island"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"North Korea"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Northern Mariana Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Norway"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"OM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Oman"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Pakistan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Palestinian Territory"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Panama"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Papua New Guinea"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Paraguay"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Peru"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Philippines"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Pitcairn"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Poland"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Portugal"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Puerto Rico"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"QA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Qatar"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"RE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Reunion"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"RO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Romania"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"RU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Russia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"RW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Rwanda"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ST"</span><span class="p">:</span><span class="w"> </span><span class="s2">"S&amp;atilde;o Tom&amp;eacute; and Pr&amp;iacute;ncipe"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Barth&amp;eacute;lemy"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Helena"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Kitts and Nevis"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Lucia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SX"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Martin (Dutch part)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Martin (French part)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Pierre and Miquelon"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Vincent and the Grenadines"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"WS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Samoa"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"San Marino"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saudi Arabia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Senegal"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"RS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Serbia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Seychelles"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sierra Leone"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Singapore"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Slovakia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Slovenia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Solomon Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Somalia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ZA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"South Africa"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"South Georgia/Sandwich Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"South Korea"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"South Sudan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ES"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Spain"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sri Lanka"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sudan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Suriname"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SJ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Svalbard and Jan Mayen"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Swaziland"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sweden"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Switzerland"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Syria"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Taiwan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TJ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tajikistan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tanzania"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Thailand"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Timor-Leste"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Togo"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tokelau"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tonga"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Trinidad and Tobago"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tunisia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Turkey"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Turkmenistan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Turks and Caicos Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TV"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tuvalu"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"UG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Uganda"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"UA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ukraine"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"United Arab Emirates"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"United Kingdom (UK)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"US"</span><span class="p">:</span><span class="w"> </span><span class="s2">"United States (US)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"UM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"United States (US) Minor Outlying Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"United States (US) Virgin Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"UY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Uruguay"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"UZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Uzbekistan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Vanuatu"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Vatican"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Venezuela"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Vietnam"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"WF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Wallis and Futuna"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"EH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Western Sahara"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"YE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Yemen"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ZM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Zambia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ZW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Zimbabwe"</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general/woocommerce_all_except_countries"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"woocommerce_specific_allowed_countries"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sell to specific countries"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"multiselect"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"default"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"value"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"AX"</span><span class="p">:</span><span class="w"> </span><span class="s2">"&amp;#197;land Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Afghanistan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Albania"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"DZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Algeria"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"American Samoa"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Andorra"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Angola"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Anguilla"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AQ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Antarctica"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Antigua and Barbuda"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Argentina"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Armenia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Aruba"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Australia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Austria"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Azerbaijan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bahamas"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bahrain"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bangladesh"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Barbados"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Belarus"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Belau"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Belgium"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Belize"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BJ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Benin"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bermuda"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bhutan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bolivia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BQ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bonaire, Saint Eustatius and Saba"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bosnia and Herzegovina"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Botswana"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BV"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bouvet Island"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Brazil"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"British Indian Ocean Territory"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"British Virgin Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Brunei"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bulgaria"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Burkina Faso"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Burundi"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cambodia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cameroon"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Canada"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CV"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cape Verde"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cayman Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Central African Republic"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Chad"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Chile"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"China"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CX"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Christmas Island"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cocos (Keeling) Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Colombia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Comoros"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Congo (Brazzaville)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Congo (Kinshasa)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cook Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Costa Rica"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Croatia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cuba"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cura&amp;ccedil;ao"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cyprus"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Czech Republic"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"DK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Denmark"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"DJ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Djibouti"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"DM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Dominica"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"DO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Dominican Republic"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"EC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ecuador"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"EG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Egypt"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SV"</span><span class="p">:</span><span class="w"> </span><span class="s2">"El Salvador"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GQ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Equatorial Guinea"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ER"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Eritrea"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"EE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Estonia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ET"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ethiopia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"FK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Falkland Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"FO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Faroe Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"FJ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Fiji"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"FI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Finland"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"FR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"France"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"French Guiana"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"French Polynesia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"French Southern Territories"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Gabon"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Gambia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Georgia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"DE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Germany"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ghana"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Gibraltar"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Greece"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Greenland"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Grenada"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guadeloupe"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guam"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guatemala"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guernsey"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guinea"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guinea-Bissau"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guyana"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Haiti"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Heard Island and McDonald Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Honduras"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Hong Kong"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Hungary"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Iceland"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"India"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ID"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Indonesia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Iran"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IQ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Iraq"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ireland"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Isle of Man"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Israel"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Italy"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ivory Coast"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"JM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Jamaica"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"JP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Japan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"JE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Jersey"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"JO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Jordan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kazakhstan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kenya"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kiribati"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kuwait"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kyrgyzstan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Laos"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LV"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Latvia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lebanon"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lesotho"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Liberia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Libya"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Liechtenstein"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lithuania"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Luxembourg"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Macao S.A.R., China"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Macedonia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Madagascar"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Malawi"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Malaysia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MV"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Maldives"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ML"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mali"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Malta"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Marshall Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MQ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Martinique"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mauritania"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mauritius"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"YT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mayotte"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MX"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mexico"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"FM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Micronesia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Moldova"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Monaco"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mongolia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ME"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Montenegro"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Montserrat"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Morocco"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mozambique"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Myanmar"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Namibia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Nauru"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Nepal"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Netherlands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"New Caledonia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"New Zealand"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Nicaragua"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Niger"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Nigeria"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Niue"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Norfolk Island"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"North Korea"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Northern Mariana Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Norway"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"OM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Oman"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Pakistan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Palestinian Territory"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Panama"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Papua New Guinea"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Paraguay"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Peru"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Philippines"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Pitcairn"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Poland"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Portugal"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Puerto Rico"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"QA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Qatar"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"RE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Reunion"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"RO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Romania"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"RU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Russia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"RW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Rwanda"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ST"</span><span class="p">:</span><span class="w"> </span><span class="s2">"S&amp;atilde;o Tom&amp;eacute; and Pr&amp;iacute;ncipe"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Barth&amp;eacute;lemy"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Helena"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Kitts and Nevis"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Lucia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SX"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Martin (Dutch part)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Martin (French part)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Pierre and Miquelon"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Vincent and the Grenadines"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"WS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Samoa"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"San Marino"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saudi Arabia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Senegal"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"RS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Serbia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Seychelles"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sierra Leone"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Singapore"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Slovakia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Slovenia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Solomon Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Somalia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ZA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"South Africa"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"South Georgia/Sandwich Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"South Korea"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"South Sudan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ES"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Spain"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sri Lanka"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sudan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Suriname"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SJ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Svalbard and Jan Mayen"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Swaziland"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sweden"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Switzerland"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Syria"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Taiwan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TJ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tajikistan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tanzania"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Thailand"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Timor-Leste"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Togo"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tokelau"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tonga"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Trinidad and Tobago"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tunisia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Turkey"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Turkmenistan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Turks and Caicos Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TV"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tuvalu"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"UG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Uganda"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"UA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ukraine"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"United Arab Emirates"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"United Kingdom (UK)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"US"</span><span class="p">:</span><span class="w"> </span><span class="s2">"United States (US)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"UM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"United States (US) Minor Outlying Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"United States (US) Virgin Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"UY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Uruguay"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"UZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Uzbekistan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Vanuatu"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Vatican"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Venezuela"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Vietnam"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"WF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Wallis and Futuna"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"EH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Western Sahara"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"YE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Yemen"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ZM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Zambia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ZW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Zimbabwe"</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general/woocommerce_specific_allowed_countries"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"woocommerce_ship_to_countries"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Shipping location(s)"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Choose which countries you want to ship to, or choose to ship to all locations you sell to."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"select"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"default"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">""</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ship to all countries you sell to"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"all"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ship to all countries"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"specific"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ship to specific countries only"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"disabled"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Disable shipping &amp;amp; shipping calculations"</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="nl">"tip"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Choose which countries you want to ship to, or choose to ship to all locations you sell to."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"value"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general/woocommerce_ship_to_countries"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"woocommerce_specific_ship_to_countries"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ship to specific countries"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"multiselect"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"default"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"value"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"AX"</span><span class="p">:</span><span class="w"> </span><span class="s2">"&amp;#197;land Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Afghanistan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Albania"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"DZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Algeria"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"American Samoa"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Andorra"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Angola"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Anguilla"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AQ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Antarctica"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Antigua and Barbuda"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Argentina"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Armenia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Aruba"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Australia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Austria"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Azerbaijan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bahamas"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bahrain"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bangladesh"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Barbados"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Belarus"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Belau"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Belgium"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Belize"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BJ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Benin"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bermuda"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bhutan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bolivia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BQ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bonaire, Saint Eustatius and Saba"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bosnia and Herzegovina"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Botswana"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BV"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bouvet Island"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Brazil"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"British Indian Ocean Territory"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"British Virgin Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Brunei"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bulgaria"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Burkina Faso"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Burundi"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cambodia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cameroon"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Canada"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CV"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cape Verde"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cayman Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Central African Republic"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Chad"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Chile"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"China"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CX"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Christmas Island"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cocos (Keeling) Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Colombia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Comoros"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Congo (Brazzaville)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Congo (Kinshasa)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cook Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Costa Rica"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Croatia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cuba"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cura&amp;ccedil;ao"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cyprus"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Czech Republic"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"DK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Denmark"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"DJ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Djibouti"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"DM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Dominica"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"DO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Dominican Republic"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"EC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ecuador"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"EG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Egypt"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SV"</span><span class="p">:</span><span class="w"> </span><span class="s2">"El Salvador"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GQ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Equatorial Guinea"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ER"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Eritrea"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"EE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Estonia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ET"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ethiopia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"FK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Falkland Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"FO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Faroe Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"FJ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Fiji"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"FI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Finland"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"FR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"France"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"French Guiana"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"French Polynesia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"French Southern Territories"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Gabon"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Gambia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Georgia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"DE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Germany"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ghana"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Gibraltar"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Greece"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Greenland"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Grenada"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guadeloupe"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guam"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guatemala"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guernsey"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guinea"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guinea-Bissau"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guyana"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Haiti"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Heard Island and McDonald Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Honduras"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Hong Kong"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Hungary"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Iceland"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"India"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ID"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Indonesia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Iran"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IQ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Iraq"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ireland"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Isle of Man"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Israel"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Italy"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ivory Coast"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"JM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Jamaica"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"JP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Japan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"JE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Jersey"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"JO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Jordan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kazakhstan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kenya"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kiribati"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kuwait"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kyrgyzstan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Laos"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LV"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Latvia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lebanon"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lesotho"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Liberia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Libya"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Liechtenstein"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lithuania"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Luxembourg"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Macao S.A.R., China"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Macedonia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Madagascar"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Malawi"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Malaysia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MV"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Maldives"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ML"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mali"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Malta"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Marshall Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MQ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Martinique"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mauritania"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mauritius"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"YT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mayotte"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MX"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mexico"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"FM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Micronesia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Moldova"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Monaco"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mongolia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ME"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Montenegro"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Montserrat"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Morocco"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mozambique"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Myanmar"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Namibia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Nauru"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Nepal"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Netherlands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"New Caledonia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"New Zealand"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Nicaragua"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Niger"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Nigeria"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Niue"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Norfolk Island"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"North Korea"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Northern Mariana Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Norway"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"OM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Oman"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Pakistan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Palestinian Territory"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Panama"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Papua New Guinea"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Paraguay"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Peru"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Philippines"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Pitcairn"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Poland"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Portugal"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Puerto Rico"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"QA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Qatar"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"RE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Reunion"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"RO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Romania"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"RU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Russia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"RW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Rwanda"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ST"</span><span class="p">:</span><span class="w"> </span><span class="s2">"S&amp;atilde;o Tom&amp;eacute; and Pr&amp;iacute;ncipe"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Barth&amp;eacute;lemy"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Helena"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Kitts and Nevis"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Lucia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SX"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Martin (Dutch part)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Martin (French part)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Pierre and Miquelon"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Vincent and the Grenadines"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"WS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Samoa"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"San Marino"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saudi Arabia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Senegal"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"RS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Serbia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Seychelles"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sierra Leone"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Singapore"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Slovakia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Slovenia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Solomon Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Somalia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ZA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"South Africa"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"South Georgia/Sandwich Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"South Korea"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"South Sudan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ES"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Spain"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sri Lanka"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sudan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Suriname"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SJ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Svalbard and Jan Mayen"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Swaziland"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sweden"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Switzerland"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Syria"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Taiwan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TJ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tajikistan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tanzania"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Thailand"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Timor-Leste"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Togo"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tokelau"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tonga"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Trinidad and Tobago"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tunisia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Turkey"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Turkmenistan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Turks and Caicos Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TV"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tuvalu"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"UG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Uganda"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"UA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ukraine"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"United Arab Emirates"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"United Kingdom (UK)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"US"</span><span class="p">:</span><span class="w"> </span><span class="s2">"United States (US)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"UM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"United States (US) Minor Outlying Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VI"</span><span class="p">:</span><span class="w"> </span><span class="s2">"United States (US) Virgin Islands"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"UY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Uruguay"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"UZ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Uzbekistan"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Vanuatu"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Vatican"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Venezuela"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Vietnam"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"WF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Wallis and Futuna"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"EH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Western Sahara"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"YE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Yemen"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ZM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Zambia"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ZW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Zimbabwe"</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general/woocommerce_specific_ship_to_countries"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"woocommerce_default_customer_address"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Default customer location"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"select"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"default"</span><span class="p">:</span><span class="w"> </span><span class="s2">"geolocation"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">""</span><span class="p">:</span><span class="w"> </span><span class="s2">"No location by default"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"base"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Shop base address"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"geolocation"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Geolocate"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"geolocation_ajax"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Geolocate (with page caching support)"</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="nl">"tip"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This option determines a customers default location. The MaxMind GeoLite Database will be periodically downloaded to your wp-content directory if using geolocation."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"value"</span><span class="p">:</span><span class="w"> </span><span class="s2">"geolocation"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general/woocommerce_default_customer_address"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"woocommerce_calc_taxes"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Enable taxes"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Enable taxes and tax calculations"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"checkbox"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"default"</span><span class="p">:</span><span class="w"> </span><span class="s2">"no"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"value"</span><span class="p">:</span><span class="w"> </span><span class="s2">"yes"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general/woocommerce_calc_taxes"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"woocommerce_demo_store"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Store notice"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Enable site-wide store notice text"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"checkbox"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"default"</span><span class="p">:</span><span class="w"> </span><span class="s2">"no"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"value"</span><span class="p">:</span><span class="w"> </span><span class="s2">"no"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general/woocommerce_demo_store"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"woocommerce_demo_store_notice"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Store notice text"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">""</span><span class="p">,</span><span class="w">
    </span><span class="nl">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"textarea"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"default"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This is a demo store for testing purposes &amp;mdash; no orders shall be fulfilled."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"value"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This is a demo store for testing purposes &amp;mdash; no orders shall be fulfilled."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general/woocommerce_demo_store_notice"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"woocommerce_currency"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Currency"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This controls what currency prices are listed at in the catalog and which currency gateways will take payments in."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"select"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"default"</span><span class="p">:</span><span class="w"> </span><span class="s2">"GBP"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"AED"</span><span class="p">:</span><span class="w"> </span><span class="s2">"United Arab Emirates dirham (&amp;#x62f;.&amp;#x625;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AFN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Afghan afghani (&amp;#x60b;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ALL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Albanian lek (L)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AMD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Armenian dram (AMD)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ANG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Netherlands Antillean guilder (&amp;fnof;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AOA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Angolan kwanza (Kz)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ARS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Argentine peso (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AUD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Australian dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AWG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Aruban florin (&amp;fnof;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"AZN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Azerbaijani manat (AZN)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BAM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bosnia and Herzegovina convertible mark (KM)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BBD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Barbadian dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BDT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bangladeshi taka (&amp;#2547;&amp;nbsp;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BGN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bulgarian lev (&amp;#1083;&amp;#1074;.)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BHD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bahraini dinar (.&amp;#x62f;.&amp;#x628;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BIF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Burundian franc (Fr)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BMD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bermudian dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BND"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Brunei dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BOB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bolivian boliviano (Bs.)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BRL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Brazilian real (&amp;#82;&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BSD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bahamian dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BTC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bitcoin (&amp;#3647;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BTN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bhutanese ngultrum (Nu.)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BWP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Botswana pula (P)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BYR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Belarusian ruble (Br)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"BZD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Belize dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CAD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Canadian dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CDF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Congolese franc (Fr)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CHF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Swiss franc (&amp;#67;&amp;#72;&amp;#70;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CLP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Chilean peso (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CNY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Chinese yuan (&amp;yen;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"COP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Colombian peso (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CRC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Costa Rican col&amp;oacute;n (&amp;#x20a1;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CUC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cuban convertible peso (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CUP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cuban peso (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CVE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cape Verdean escudo (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"CZK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Czech koruna (&amp;#75;&amp;#269;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"DJF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Djiboutian franc (Fr)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"DKK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Danish krone (DKK)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"DOP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Dominican peso (RD&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"DZD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Algerian dinar (&amp;#x62f;.&amp;#x62c;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"EGP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Egyptian pound (EGP)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ERN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Eritrean nakfa (Nfk)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ETB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ethiopian birr (Br)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"EUR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Euro (&amp;euro;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"FJD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Fijian dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"FKP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Falkland Islands pound (&amp;pound;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GBP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Pound sterling (&amp;pound;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GEL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Georgian lari (&amp;#x10da;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GGP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guernsey pound (&amp;pound;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GHS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ghana cedi (&amp;#x20b5;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GIP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Gibraltar pound (&amp;pound;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GMD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Gambian dalasi (D)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GNF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guinean franc (Fr)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GTQ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guatemalan quetzal (Q)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"GYD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guyanese dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HKD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Hong Kong dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HNL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Honduran lempira (L)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HRK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Croatian kuna (Kn)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HTG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Haitian gourde (G)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"HUF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Hungarian forint (&amp;#70;&amp;#116;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IDR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Indonesian rupiah (Rp)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ILS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Israeli new shekel (&amp;#8362;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IMP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Manx pound (&amp;pound;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"INR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Indian rupee (&amp;#8377;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IQD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Iraqi dinar (&amp;#x639;.&amp;#x62f;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IRR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Iranian rial (&amp;#xfdfc;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"IRT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Iranian toman (&amp;#x062A;&amp;#x0648;&amp;#x0645;&amp;#x0627;&amp;#x0646;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ISK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Icelandic kr&amp;oacute;na (kr.)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"JEP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Jersey pound (&amp;pound;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"JMD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Jamaican dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"JOD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Jordanian dinar (&amp;#x62f;.&amp;#x627;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"JPY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Japanese yen (&amp;yen;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KES"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kenyan shilling (KSh)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KGS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kyrgyzstani som (&amp;#x441;&amp;#x43e;&amp;#x43c;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KHR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cambodian riel (&amp;#x17db;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KMF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Comorian franc (Fr)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KPW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"North Korean won (&amp;#x20a9;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KRW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"South Korean won (&amp;#8361;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KWD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kuwaiti dinar (&amp;#x62f;.&amp;#x643;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KYD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cayman Islands dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"KZT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kazakhstani tenge (KZT)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LAK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lao kip (&amp;#8365;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LBP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lebanese pound (&amp;#x644;.&amp;#x644;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LKR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sri Lankan rupee (&amp;#xdbb;&amp;#xdd4;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LRD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Liberian dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LSL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lesotho loti (L)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"LYD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Libyan dinar (&amp;#x644;.&amp;#x62f;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MAD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Moroccan dirham (&amp;#x62f;.&amp;#x645;.)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MDL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Moldovan leu (MDL)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MGA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Malagasy ariary (Ar)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MKD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Macedonian denar (&amp;#x434;&amp;#x435;&amp;#x43d;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MMK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Burmese kyat (Ks)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MNT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mongolian t&amp;ouml;gr&amp;ouml;g (&amp;#x20ae;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MOP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Macanese pataca (P)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MRO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mauritanian ouguiya (UM)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MUR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mauritian rupee (&amp;#x20a8;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MVR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Maldivian rufiyaa (.&amp;#x783;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MWK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Malawian kwacha (MK)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MXN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mexican peso (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MYR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Malaysian ringgit (&amp;#82;&amp;#77;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"MZN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mozambican metical (MT)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NAD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Namibian dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NGN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Nigerian naira (&amp;#8358;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NIO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Nicaraguan c&amp;oacute;rdoba (C&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NOK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Norwegian krone (&amp;#107;&amp;#114;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NPR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Nepalese rupee (&amp;#8360;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"NZD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"New Zealand dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"OMR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Omani rial (&amp;#x631;.&amp;#x639;.)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PAB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Panamanian balboa (B/.)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PEN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Peruvian nuevo sol (S/.)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PGK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Papua New Guinean kina (K)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PHP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Philippine peso (&amp;#8369;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PKR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Pakistani rupee (&amp;#8360;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PLN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Polish z&amp;#x142;oty (&amp;#122;&amp;#322;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PRB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Transnistrian ruble (&amp;#x440;.)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"PYG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Paraguayan guaran&amp;iacute; (&amp;#8370;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"QAR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Qatari riyal (&amp;#x631;.&amp;#x642;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"RON"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Romanian leu (lei)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"RSD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Serbian dinar (&amp;#x434;&amp;#x438;&amp;#x43d;.)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"RUB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Russian ruble (&amp;#8381;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"RWF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Rwandan franc (Fr)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SAR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saudi riyal (&amp;#x631;.&amp;#x633;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SBD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Solomon Islands dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SCR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Seychellois rupee (&amp;#x20a8;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SDG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sudanese pound (&amp;#x62c;.&amp;#x633;.)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SEK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Swedish krona (&amp;#107;&amp;#114;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SGD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Singapore dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SHP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Helena pound (&amp;pound;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SLL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sierra Leonean leone (Le)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SOS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Somali shilling (Sh)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SRD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Surinamese dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SSP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"South Sudanese pound (&amp;pound;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"STD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"S&amp;atilde;o Tom&amp;eacute; and Pr&amp;iacute;ncipe dobra (Db)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SYP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Syrian pound (&amp;#x644;.&amp;#x633;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"SZL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Swazi lilangeni (L)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"THB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Thai baht (&amp;#3647;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TJS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tajikistani somoni (&amp;#x405;&amp;#x41c;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TMT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Turkmenistan manat (m)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TND"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tunisian dinar (&amp;#x62f;.&amp;#x62a;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TOP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tongan pa&amp;#x2bb;anga (T&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TRY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Turkish lira (&amp;#8378;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TTD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Trinidad and Tobago dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TWD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"New Taiwan dollar (&amp;#78;&amp;#84;&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"TZS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tanzanian shilling (Sh)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"UAH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ukrainian hryvnia (&amp;#8372;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"UGX"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ugandan shilling (UGX)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"USD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"United States dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"UYU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Uruguayan peso (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"UZS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Uzbekistani som (UZS)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VEF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Venezuelan bol&amp;iacute;var (Bs F)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VND"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Vietnamese &amp;#x111;&amp;#x1ed3;ng (&amp;#8363;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"VUV"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Vanuatu vatu (Vt)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"WST"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Samoan t&amp;#x101;l&amp;#x101; (T)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"XAF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Central African CFA franc (Fr)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"XCD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"East Caribbean dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"XOF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"West African CFA franc (Fr)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"XPF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"CFP franc (Fr)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"YER"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Yemeni rial (&amp;#xfdfc;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ZAR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"South African rand (&amp;#82;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"ZMW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Zambian kwacha (ZK)"</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="nl">"tip"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This controls what currency prices are listed at in the catalog and which currency gateways will take payments in."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"value"</span><span class="p">:</span><span class="w"> </span><span class="s2">"USD"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general/woocommerce_currency"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"woocommerce_currency_pos"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Currency position"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This controls the position of the currency symbol."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"select"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"default"</span><span class="p">:</span><span class="w"> </span><span class="s2">"left"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"left"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Left (&amp;#36;99.99)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"right"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Right (99.99&amp;#36;)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"left_space"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Left with space (&amp;#36; 99.99)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"right_space"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Right with space (99.99 &amp;#36;)"</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="nl">"tip"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This controls the position of the currency symbol."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"value"</span><span class="p">:</span><span class="w"> </span><span class="s2">"left"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general/woocommerce_currency_pos"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"woocommerce_price_thousand_sep"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Thousand separator"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This sets the thousand separator of displayed prices."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"text"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"default"</span><span class="p">:</span><span class="w"> </span><span class="s2">","</span><span class="p">,</span><span class="w">
    </span><span class="nl">"tip"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This sets the thousand separator of displayed prices."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"value"</span><span class="p">:</span><span class="w"> </span><span class="s2">","</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general/woocommerce_price_thousand_sep"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"woocommerce_price_decimal_sep"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Decimal separator"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This sets the decimal separator of displayed prices."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"text"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"default"</span><span class="p">:</span><span class="w"> </span><span class="s2">"."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"tip"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This sets the decimal separator of displayed prices."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"value"</span><span class="p">:</span><span class="w"> </span><span class="s2">"."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general/woocommerce_price_decimal_sep"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="p">{</span><span class="w">
    </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"woocommerce_price_num_decimals"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Number of decimals"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This sets the number of decimal points shown in displayed prices."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"number"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"default"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"tip"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This sets the number of decimal points shown in displayed prices."</span><span class="p">,</span><span class="w">
    </span><span class="nl">"value"</span><span class="p">:</span><span class="w"> </span><span class="s2">"2"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
      </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general/woocommerce_price_num_decimals"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">],</span><span class="w">
      </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
        </span><span class="p">{</span><span class="w">
          </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general"</span><span class="w">
        </span><span class="p">}</span><span class="w">
      </span><span class="p">]</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">]</span><span class="w">
</span></code></pre></div><h2 id="update-a-setting-option">Update a setting option</h2>
<p>This API lets you make changes to a setting option.</p>
<h3 id="http-request-3">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-put">PUT</i>
        <h6>/wp-json/wc/v3/settings/&lt;group_id&gt;/&lt;id&gt;</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <span class="nt">-X</span> PUT <?php echo $domain; ?>wp-json/wc/v3/settings/general/woocommerce_allowed_countries <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret <span class="se">\</span>
    <span class="nt">-H</span> <span class="s2">"Content-Type: application/json"</span> <span class="se">\</span>
    <span class="nt">-d</span> <span class="s1">'{
  "value": "all_except"
}'</span>
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="kd">const</span> <span class="nx">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="na">value</span><span class="p">:</span> <span class="dl">"</span><span class="s2">all_except</span><span class="dl">"</span>
<span class="p">};</span>

<span class="nx">WooCommerce</span><span class="p">.</span><span class="nx">put</span><span class="p">(</span><span class="dl">"</span><span class="s2">settings/general/woocommerce_allowed_countries</span><span class="dl">"</span><span class="p">,</span> <span class="nx">data</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span> 
<span class="nv">$data</span> <span class="o">=</span> <span class="p">[</span>
    <span class="s1">'value'</span> <span class="o">=&gt;</span> <span class="s1">'all_except'</span>
<span class="p">];</span>

<span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">put</span><span class="p">(</span><span class="s1">'settings/general/woocommerce_allowed_countries'</span><span class="p">,</span> <span class="nv">$data</span><span class="p">));</span>
<span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
    <span class="s">"value"</span><span class="p">:</span> <span class="s">"all_except"</span>
<span class="p">}</span>

<span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">put</span><span class="p">(</span><span class="s">"settings/general/woocommerce_allowed_countries"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="ss">value: </span><span class="s2">"all_except"</span>
<span class="p">}</span>

<span class="n">woocommerce</span><span class="p">.</span><span class="nf">put</span><span class="p">(</span><span class="s2">"settings/general/woocommerce_allowed_countries"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"woocommerce_allowed_countries"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Selling location(s)"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This option lets you limit which countries you are willing to sell to."</span><span class="p">,</span><span class="w">
  </span><span class="nl">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"select"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"default"</span><span class="p">:</span><span class="w"> </span><span class="s2">"all"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
    </span><span class="nl">"all"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sell to all countries"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"all_except"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sell to all countries, except for&amp;hellip;"</span><span class="p">,</span><span class="w">
    </span><span class="nl">"specific"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sell to specific countries"</span><span class="w">
  </span><span class="p">},</span><span class="w">
  </span><span class="nl">"tip"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This option lets you limit which countries you are willing to sell to."</span><span class="p">,</span><span class="w">
  </span><span class="nl">"value"</span><span class="p">:</span><span class="w"> </span><span class="s2">"all_except"</span><span class="p">,</span><span class="w">
  </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
    </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general/woocommerce_allowed_countries"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">],</span><span class="w">
    </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
      </span><span class="p">{</span><span class="w">
        </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general"</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">]</span><span class="w">
  </span><span class="p">}</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre></div><h2 id="batch-update-setting-options">Batch update setting options</h2>
<p>This API helps you to batch update multiple setting options.</p>

<aside class="notice">
Note: By default it's limited to up to 100 objects to be created, updated or deleted. 
</aside>
<h3 id="http-request-4">HTTP request</h3>
<div class="api-endpoint">
    <div class="endpoint-data">
        <i class="label label-post">POST</i>
        <h6>/wp-json/wc/v3/settings/&lt;id&gt;/batch</h6>
    </div>
</div>
<div class="highlight"><pre class="highlight shell tab-shell" style=""><code>curl <span class="nt">-X</span> POST <?php echo $domain; ?>wp-json/wc/v3/settings/general/batch <span class="se">\</span>
    <span class="nt">-u</span> consumer_key:consumer_secret <span class="se">\</span>
    <span class="nt">-H</span> <span class="s2">"Content-Type: application/json"</span> <span class="se">\</span>
    <span class="nt">-d</span> <span class="s1">'{
  "update": [
    {
      "id": "woocommerce_allowed_countries",
      "value": "all"
    },
    {
      "id": "woocommerce_demo_store",
      "value": "yes"
    },
    {
      "id": "woocommerce_currency",
      "value": "GBP"
    }
  ]
}'</span>
</code></pre></div><div class="highlight"><pre class="highlight javascript tab-javascript" style="display: none;"><code><span class="kd">const</span> <span class="nx">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="na">create</span><span class="p">:</span> <span class="p">[</span>
    <span class="p">{</span>
      <span class="na">regular_price</span><span class="p">:</span> <span class="dl">"</span><span class="s2">10.00</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">attributes</span><span class="p">:</span> <span class="p">[</span>
        <span class="p">{</span>
          <span class="na">id</span><span class="p">:</span> <span class="mi">6</span><span class="p">,</span>
          <span class="na">option</span><span class="p">:</span> <span class="dl">"</span><span class="s2">Blue</span><span class="dl">"</span>
        <span class="p">}</span>
      <span class="p">]</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="na">regular_price</span><span class="p">:</span> <span class="dl">"</span><span class="s2">10.00</span><span class="dl">"</span><span class="p">,</span>
      <span class="na">attributes</span><span class="p">:</span> <span class="p">[</span>
        <span class="p">{</span>
          <span class="na">id</span><span class="p">:</span> <span class="mi">6</span><span class="p">,</span>
          <span class="na">option</span><span class="p">:</span> <span class="dl">"</span><span class="s2">White</span><span class="dl">"</span>
        <span class="p">}</span>
      <span class="p">]</span>
    <span class="p">}</span>
  <span class="p">],</span>
  <span class="na">update</span><span class="p">:</span> <span class="p">[</span>
    <span class="p">{</span>
      <span class="na">id</span><span class="p">:</span> <span class="mi">733</span><span class="p">,</span>
      <span class="na">regular_price</span><span class="p">:</span> <span class="dl">"</span><span class="s2">10.00</span><span class="dl">"</span>
    <span class="p">}</span>
  <span class="p">],</span>
  <span class="na">delete</span><span class="p">:</span> <span class="p">[</span>
    <span class="mi">732</span>
  <span class="p">]</span>
<span class="p">};</span>

<span class="nx">WooCommerce</span><span class="p">.</span><span class="nx">post</span><span class="p">(</span><span class="dl">"</span><span class="s2">products/22/settings/general/batch</span><span class="dl">"</span><span class="p">,</span> <span class="nx">data</span><span class="p">)</span>
  <span class="p">.</span><span class="nx">then</span><span class="p">((</span><span class="nx">response</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">})</span>
  <span class="p">.</span><span class="k">catch</span><span class="p">((</span><span class="nx">error</span><span class="p">)</span> <span class="o">=&gt;</span> <span class="p">{</span>
    <span class="nx">console</span><span class="p">.</span><span class="nx">log</span><span class="p">(</span><span class="nx">error</span><span class="p">.</span><span class="nx">response</span><span class="p">.</span><span class="nx">data</span><span class="p">);</span>
  <span class="p">});</span>
</code></pre></div><div class="highlight"><pre class="highlight php tab-php" style="display: none;"><code><span class="cp">&lt;?php</span>
<span class="nv">$data</span> <span class="o">=</span> <span class="p">[</span>
    <span class="s1">'create'</span> <span class="o">=&gt;</span> <span class="p">[</span>
        <span class="p">[</span>
            <span class="s1">'regular_price'</span> <span class="o">=&gt;</span> <span class="s1">'10.00'</span><span class="p">,</span>
            <span class="s1">'attributes'</span> <span class="o">=&gt;</span> <span class="p">[</span>
                <span class="p">[</span>
                    <span class="s1">'id'</span> <span class="o">=&gt;</span> <span class="mi">6</span><span class="p">,</span>
                    <span class="s1">'option'</span> <span class="o">=&gt;</span> <span class="s1">'Blue'</span>
                <span class="p">]</span>
            <span class="p">]</span>
        <span class="p">],</span>
        <span class="p">[</span>
            <span class="s1">'regular_price'</span> <span class="o">=&gt;</span> <span class="s1">'10.00'</span><span class="p">,</span>
            <span class="s1">'attributes'</span> <span class="o">=&gt;</span> <span class="p">[</span>
                <span class="p">[</span>
                    <span class="s1">'id'</span> <span class="o">=&gt;</span> <span class="mi">6</span><span class="p">,</span>
                    <span class="s1">'option'</span> <span class="o">=&gt;</span> <span class="s1">'White'</span>
                <span class="p">]</span>
            <span class="p">]</span>
        <span class="p">]</span>
    <span class="p">],</span>
    <span class="s1">'update'</span> <span class="o">=&gt;</span> <span class="p">[</span>
        <span class="p">[</span>
            <span class="s1">'id'</span> <span class="o">=&gt;</span> <span class="mi">733</span><span class="p">,</span>
            <span class="s1">'regular_price'</span> <span class="o">=&gt;</span> <span class="s1">'10.00'</span>
        <span class="p">]</span>
    <span class="p">],</span>
    <span class="s1">'delete'</span> <span class="o">=&gt;</span> <span class="p">[</span>
        <span class="mi">732</span>
    <span class="p">]</span>
<span class="p">];</span>

<span class="nb">print_r</span><span class="p">(</span><span class="nv">$woocommerce</span><span class="o">-&gt;</span><span class="nf">post</span><span class="p">(</span><span class="s1">'products/22/settings/general/batch'</span><span class="p">,</span> <span class="nv">$data</span><span class="p">));</span>
<span class="cp">?&gt;</span>
</code></pre></div><div class="highlight"><pre class="highlight python tab-python" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
    <span class="s">"create"</span><span class="p">:</span> <span class="p">[</span>
        <span class="p">{</span>
            <span class="s">"regular_price"</span><span class="p">:</span> <span class="s">"10.00"</span><span class="p">,</span>
            <span class="s">"attributes"</span><span class="p">:</span> <span class="p">[</span>
                <span class="p">{</span>
                    <span class="s">"id"</span><span class="p">:</span> <span class="mi">6</span><span class="p">,</span>
                    <span class="s">"option"</span><span class="p">:</span> <span class="s">"Blue"</span>
                <span class="p">}</span>
            <span class="p">]</span>
        <span class="p">},</span>
        <span class="p">{</span>
            <span class="s">"regular_price"</span><span class="p">:</span> <span class="s">"10.00"</span><span class="p">,</span>
            <span class="s">"attributes"</span><span class="p">:</span> <span class="p">[</span>
                <span class="p">{</span>
                    <span class="s">"id"</span><span class="p">:</span> <span class="mi">6</span><span class="p">,</span>
                    <span class="s">"option"</span><span class="p">:</span> <span class="s">"White"</span>
                <span class="p">}</span>
            <span class="p">]</span>
        <span class="p">}</span>
    <span class="p">],</span>
    <span class="s">"update"</span><span class="p">:</span> <span class="p">[</span>
        <span class="p">{</span>
            <span class="s">"id"</span><span class="p">:</span> <span class="mi">733</span><span class="p">,</span>
            <span class="s">"regular_price"</span><span class="p">:</span> <span class="s">"10.00"</span>
        <span class="p">}</span>
    <span class="p">],</span>
    <span class="s">"delete"</span><span class="p">:</span> <span class="p">[</span>
        <span class="mi">732</span>
    <span class="p">]</span>
<span class="p">}</span>

<span class="k">print</span><span class="p">(</span><span class="n">wcapi</span><span class="p">.</span><span class="n">post</span><span class="p">(</span><span class="s">"products/22/settings/general/batch"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="n">json</span><span class="p">())</span>
</code></pre></div><div class="highlight"><pre class="highlight ruby tab-ruby" style="display: none;"><code><span class="n">data</span> <span class="o">=</span> <span class="p">{</span>
  <span class="ss">create: </span><span class="p">[</span>
    <span class="p">{</span>
      <span class="ss">regular_price: </span><span class="s2">"10.00"</span><span class="p">,</span>
      <span class="ss">attributes: </span><span class="p">[</span>
        <span class="p">{</span>
          <span class="ss">id: </span><span class="mi">6</span><span class="p">,</span>
          <span class="ss">option: </span><span class="s2">"Blue"</span>
        <span class="p">}</span>
      <span class="p">]</span>
    <span class="p">},</span>
    <span class="p">{</span>
      <span class="ss">regular_price: </span><span class="s2">"10.00"</span><span class="p">,</span>
      <span class="ss">attributes: </span><span class="p">[</span>
        <span class="p">{</span>
          <span class="ss">id: </span><span class="mi">6</span><span class="p">,</span>
          <span class="ss">option: </span><span class="s2">"White"</span>
        <span class="p">}</span>
      <span class="p">]</span>
    <span class="p">}</span>
  <span class="p">],</span>
  <span class="ss">update: </span><span class="p">[</span>
    <span class="p">{</span>
      <span class="ss">id: </span><span class="mi">733</span><span class="p">,</span>
      <span class="ss">regular_price: </span><span class="s2">"10.00"</span>
    <span class="p">}</span>
  <span class="p">],</span>
  <span class="ss">delete: </span><span class="p">[</span>
    <span class="mi">732</span>
  <span class="p">]</span>
<span class="p">}</span>

<span class="n">woocommerce</span><span class="p">.</span><span class="nf">post</span><span class="p">(</span><span class="s2">"products/22/settings/general/batch"</span><span class="p">,</span> <span class="n">data</span><span class="p">).</span><span class="nf">parsed_response</span>
</code></pre></div>
<blockquote>
<p>JSON response example:</p>
</blockquote>
<div class="highlight"><pre class="highlight json tab-json"><code><span class="p">{</span><span class="w">
  </span><span class="nl">"update"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"woocommerce_allowed_countries"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Selling location(s)"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This option lets you limit which countries you are willing to sell to."</span><span class="p">,</span><span class="w">
      </span><span class="nl">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"select"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"default"</span><span class="p">:</span><span class="w"> </span><span class="s2">"all"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"all"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sell to all countries"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"all_except"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sell to all countries, except for&amp;hellip;"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"specific"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sell to specific countries"</span><span class="w">
      </span><span class="p">},</span><span class="w">
      </span><span class="nl">"tip"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This option lets you limit which countries you are willing to sell to."</span><span class="p">,</span><span class="w">
      </span><span class="nl">"value"</span><span class="p">:</span><span class="w"> </span><span class="s2">"all"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general/woocommerce_allowed_countries"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"woocommerce_demo_store"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Store notice"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Enable site-wide store notice text"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"checkbox"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"default"</span><span class="p">:</span><span class="w"> </span><span class="s2">"no"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"value"</span><span class="p">:</span><span class="w"> </span><span class="s2">"yes"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general/woocommerce_demo_store"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">},</span><span class="w">
    </span><span class="p">{</span><span class="w">
      </span><span class="nl">"id"</span><span class="p">:</span><span class="w"> </span><span class="s2">"woocommerce_currency"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"label"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Currency"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"description"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This controls what currency prices are listed at in the catalog and which currency gateways will take payments in."</span><span class="p">,</span><span class="w">
      </span><span class="nl">"type"</span><span class="p">:</span><span class="w"> </span><span class="s2">"select"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"default"</span><span class="p">:</span><span class="w"> </span><span class="s2">"GBP"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"options"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"AED"</span><span class="p">:</span><span class="w"> </span><span class="s2">"United Arab Emirates dirham (&amp;#x62f;.&amp;#x625;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"AFN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Afghan afghani (&amp;#x60b;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"ALL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Albanian lek (L)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"AMD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Armenian dram (AMD)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"ANG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Netherlands Antillean guilder (&amp;fnof;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"AOA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Angolan kwanza (Kz)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"ARS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Argentine peso (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"AUD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Australian dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"AWG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Aruban florin (&amp;fnof;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"AZN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Azerbaijani manat (AZN)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"BAM"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bosnia and Herzegovina convertible mark (KM)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"BBD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Barbadian dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"BDT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bangladeshi taka (&amp;#2547;&amp;nbsp;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"BGN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bulgarian lev (&amp;#1083;&amp;#1074;.)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"BHD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bahraini dinar (.&amp;#x62f;.&amp;#x628;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"BIF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Burundian franc (Fr)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"BMD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bermudian dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"BND"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Brunei dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"BOB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bolivian boliviano (Bs.)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"BRL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Brazilian real (&amp;#82;&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"BSD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bahamian dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"BTC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bitcoin (&amp;#3647;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"BTN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Bhutanese ngultrum (Nu.)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"BWP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Botswana pula (P)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"BYR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Belarusian ruble (Br)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"BZD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Belize dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"CAD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Canadian dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"CDF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Congolese franc (Fr)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"CHF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Swiss franc (&amp;#67;&amp;#72;&amp;#70;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"CLP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Chilean peso (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"CNY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Chinese yuan (&amp;yen;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"COP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Colombian peso (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"CRC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Costa Rican col&amp;oacute;n (&amp;#x20a1;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"CUC"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cuban convertible peso (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"CUP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cuban peso (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"CVE"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cape Verdean escudo (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"CZK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Czech koruna (&amp;#75;&amp;#269;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"DJF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Djiboutian franc (Fr)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"DKK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Danish krone (DKK)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"DOP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Dominican peso (RD&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"DZD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Algerian dinar (&amp;#x62f;.&amp;#x62c;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"EGP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Egyptian pound (EGP)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"ERN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Eritrean nakfa (Nfk)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"ETB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ethiopian birr (Br)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"EUR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Euro (&amp;euro;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"FJD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Fijian dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"FKP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Falkland Islands pound (&amp;pound;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"GBP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Pound sterling (&amp;pound;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"GEL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Georgian lari (&amp;#x10da;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"GGP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guernsey pound (&amp;pound;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"GHS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ghana cedi (&amp;#x20b5;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"GIP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Gibraltar pound (&amp;pound;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"GMD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Gambian dalasi (D)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"GNF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guinean franc (Fr)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"GTQ"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guatemalan quetzal (Q)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"GYD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Guyanese dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"HKD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Hong Kong dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"HNL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Honduran lempira (L)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"HRK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Croatian kuna (Kn)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"HTG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Haitian gourde (G)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"HUF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Hungarian forint (&amp;#70;&amp;#116;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"IDR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Indonesian rupiah (Rp)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"ILS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Israeli new shekel (&amp;#8362;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"IMP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Manx pound (&amp;pound;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"INR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Indian rupee (&amp;#8377;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"IQD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Iraqi dinar (&amp;#x639;.&amp;#x62f;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"IRR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Iranian rial (&amp;#xfdfc;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"IRT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Iranian toman (&amp;#x062A;&amp;#x0648;&amp;#x0645;&amp;#x0627;&amp;#x0646;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"ISK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Icelandic kr&amp;oacute;na (kr.)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"JEP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Jersey pound (&amp;pound;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"JMD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Jamaican dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"JOD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Jordanian dinar (&amp;#x62f;.&amp;#x627;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"JPY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Japanese yen (&amp;yen;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"KES"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kenyan shilling (KSh)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"KGS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kyrgyzstani som (&amp;#x441;&amp;#x43e;&amp;#x43c;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"KHR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cambodian riel (&amp;#x17db;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"KMF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Comorian franc (Fr)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"KPW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"North Korean won (&amp;#x20a9;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"KRW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"South Korean won (&amp;#8361;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"KWD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kuwaiti dinar (&amp;#x62f;.&amp;#x643;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"KYD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Cayman Islands dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"KZT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Kazakhstani tenge (KZT)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"LAK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lao kip (&amp;#8365;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"LBP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lebanese pound (&amp;#x644;.&amp;#x644;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"LKR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sri Lankan rupee (&amp;#xdbb;&amp;#xdd4;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"LRD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Liberian dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"LSL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Lesotho loti (L)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"LYD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Libyan dinar (&amp;#x644;.&amp;#x62f;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"MAD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Moroccan dirham (&amp;#x62f;.&amp;#x645;.)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"MDL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Moldovan leu (MDL)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"MGA"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Malagasy ariary (Ar)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"MKD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Macedonian denar (&amp;#x434;&amp;#x435;&amp;#x43d;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"MMK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Burmese kyat (Ks)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"MNT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mongolian t&amp;ouml;gr&amp;ouml;g (&amp;#x20ae;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"MOP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Macanese pataca (P)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"MRO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mauritanian ouguiya (UM)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"MUR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mauritian rupee (&amp;#x20a8;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"MVR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Maldivian rufiyaa (.&amp;#x783;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"MWK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Malawian kwacha (MK)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"MXN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mexican peso (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"MYR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Malaysian ringgit (&amp;#82;&amp;#77;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"MZN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Mozambican metical (MT)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"NAD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Namibian dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"NGN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Nigerian naira (&amp;#8358;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"NIO"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Nicaraguan c&amp;oacute;rdoba (C&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"NOK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Norwegian krone (&amp;#107;&amp;#114;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"NPR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Nepalese rupee (&amp;#8360;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"NZD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"New Zealand dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"OMR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Omani rial (&amp;#x631;.&amp;#x639;.)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"PAB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Panamanian balboa (B/.)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"PEN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Peruvian nuevo sol (S/.)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"PGK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Papua New Guinean kina (K)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"PHP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Philippine peso (&amp;#8369;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"PKR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Pakistani rupee (&amp;#8360;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"PLN"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Polish z&amp;#x142;oty (&amp;#122;&amp;#322;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"PRB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Transnistrian ruble (&amp;#x440;.)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"PYG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Paraguayan guaran&amp;iacute; (&amp;#8370;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"QAR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Qatari riyal (&amp;#x631;.&amp;#x642;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"RON"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Romanian leu (lei)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"RSD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Serbian dinar (&amp;#x434;&amp;#x438;&amp;#x43d;.)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"RUB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Russian ruble (&amp;#8381;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"RWF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Rwandan franc (Fr)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"SAR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saudi riyal (&amp;#x631;.&amp;#x633;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"SBD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Solomon Islands dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"SCR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Seychellois rupee (&amp;#x20a8;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"SDG"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sudanese pound (&amp;#x62c;.&amp;#x633;.)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"SEK"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Swedish krona (&amp;#107;&amp;#114;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"SGD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Singapore dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"SHP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Saint Helena pound (&amp;pound;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"SLL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Sierra Leonean leone (Le)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"SOS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Somali shilling (Sh)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"SRD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Surinamese dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"SSP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"South Sudanese pound (&amp;pound;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"STD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"S&amp;atilde;o Tom&amp;eacute; and Pr&amp;iacute;ncipe dobra (Db)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"SYP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Syrian pound (&amp;#x644;.&amp;#x633;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"SZL"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Swazi lilangeni (L)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"THB"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Thai baht (&amp;#3647;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"TJS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tajikistani somoni (&amp;#x405;&amp;#x41c;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"TMT"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Turkmenistan manat (m)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"TND"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tunisian dinar (&amp;#x62f;.&amp;#x62a;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"TOP"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tongan pa&amp;#x2bb;anga (T&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"TRY"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Turkish lira (&amp;#8378;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"TTD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Trinidad and Tobago dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"TWD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"New Taiwan dollar (&amp;#78;&amp;#84;&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"TZS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Tanzanian shilling (Sh)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"UAH"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ukrainian hryvnia (&amp;#8372;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"UGX"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Ugandan shilling (UGX)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"USD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"United States dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"UYU"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Uruguayan peso (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"UZS"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Uzbekistani som (UZS)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"VEF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Venezuelan bol&amp;iacute;var (Bs F)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"VND"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Vietnamese &amp;#x111;&amp;#x1ed3;ng (&amp;#8363;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"VUV"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Vanuatu vatu (Vt)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"WST"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Samoan t&amp;#x101;l&amp;#x101; (T)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"XAF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Central African CFA franc (Fr)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"XCD"</span><span class="p">:</span><span class="w"> </span><span class="s2">"East Caribbean dollar (&amp;#36;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"XOF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"West African CFA franc (Fr)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"XPF"</span><span class="p">:</span><span class="w"> </span><span class="s2">"CFP franc (Fr)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"YER"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Yemeni rial (&amp;#xfdfc;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"ZAR"</span><span class="p">:</span><span class="w"> </span><span class="s2">"South African rand (&amp;#82;)"</span><span class="p">,</span><span class="w">
        </span><span class="nl">"ZMW"</span><span class="p">:</span><span class="w"> </span><span class="s2">"Zambian kwacha (ZK)"</span><span class="w">
      </span><span class="p">},</span><span class="w">
      </span><span class="nl">"tip"</span><span class="p">:</span><span class="w"> </span><span class="s2">"This controls what currency prices are listed at in the catalog and which currency gateways will take payments in."</span><span class="p">,</span><span class="w">
      </span><span class="nl">"value"</span><span class="p">:</span><span class="w"> </span><span class="s2">"GBP"</span><span class="p">,</span><span class="w">
      </span><span class="nl">"_links"</span><span class="p">:</span><span class="w"> </span><span class="p">{</span><span class="w">
        </span><span class="nl">"self"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general/woocommerce_currency"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">],</span><span class="w">
        </span><span class="nl">"collection"</span><span class="p">:</span><span class="w"> </span><span class="p">[</span><span class="w">
          </span><span class="p">{</span><span class="w">
            </span><span class="nl">"href"</span><span class="p">:</span><span class="w"> </span><span class="s2">"<?php echo $domain; ?>wp-json/wc/v3/settings/general"</span><span class="w">
          </span><span class="p">}</span><span class="w">
        </span><span class="p">]</span><span class="w">
      </span><span class="p">}</span><span class="w">
    </span><span class="p">}</span><span class="w">
  </span><span class="p">]</span><span class="w">
</span><span class="p">}</span><span class="w">
</span></code></pre></div>